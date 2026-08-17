<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Traits\Logger;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    use Logger;

    public function __construct(public Product $model)
    {
    }

    public function getAllProducts()
    {
        try {
            // بارگذاری واریانت‌ها برای جلوگیری از N+1
            return $this->model->with('variants')->get();
        } catch (\Exception $e) {
            $this->logError('failed to fetch products list', $this->parseException($e));
            throw new \RuntimeException('Error fetching products.');
        }
    }

    public function getAllWithFilters(array $filters = [])
    {
        try {
            $query = $this->model->query()->with('variants');

            // فیلتر دسته‌بندی
            $query->when(filled($filters['category'] ?? null),
                fn($q) => $q->where('category_id', $filters['category']));

            // فیلتر برند
            $query->when(!empty($filters['brands']),
                fn($q) => $q->whereIn('brand_id', $filters['brands']));

            // فیلتر بر اساس واریانت‌ها (قیمت و موجودی)
            $query->whereHas('variants', function ($q) use ($filters) {
                $q->where('is_active', true);

                if (filled($filters['price_min'] ?? null)) {
                    $q->where('price', '>=', (int)$filters['price_min']);
                }
                if (filled($filters['price_max'] ?? null)) {
                    $q->where('price', '<=', (int)$filters['price_max']);
                }
                if (($filters['onlyAvailable'] ?? false) === true) {
                    $q->where('stock', '>', 0);
                }
            });

            // مرتب‌سازی
            $this->applySorting($query, $filters['sort'] ?? null);

            return $query->paginate(32)->withQueryString();
        } catch (\Throwable $e) {
            $this->logError('Filter query failed', $this->parseException($e));
            throw new \RuntimeException('Error fetching filtered products.');
        }
    }

    public function getDiscountsProduct()
    {
        try {
            // محصولاتی که حداقل یک واریانت با قیمت تخفیفی دارند
            return $this->model->with('variants')
                ->whereHas('variants', function ($q) {
                    $q->where('is_active', true)
                        ->whereNotNull('discount_price')
                        ->where('discount_price', '>', 0);
                })->paginate(32);
        } catch (\Exception $e) {
            $this->logError('Failed to fetch discounts products', $this->parseException($e));
            throw new \RuntimeException('Error fetching discounts products.');
        }
    }

    public function getLatestProducts(int $limit = 10)
    {
        try {
            return $this->model->with('variants')->latest()->take($limit)->get();
        } catch (\Exception $e) {
            $this->logError('Failed to fetch latest products', $this->parseException($e));
            throw new \RuntimeException('Error fetching latest products.');
        }
    }

    public function getProductById($id)
    {
        try {
            return $this->model->with(['variants', 'category', 'brand'])->findOrFail($id);
        } catch (\Exception $e) {
            $this->logError('Product not found', ['id' => $id, 'error' => $e->getMessage()]);
            throw new \RuntimeException('Product not found.');
        }
    }

    // متد کمکی برای جلوگیری از تکرار کد مرتب‌سازی
    private function applySorting($query, $sortType)
    {
        match ($sortType) {
            'price_asc' => $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('products.*', DB::raw('MIN(product_variants.price) as min_price'))
                ->groupBy('products.id')
                ->orderBy('min_price', 'asc'),

            'price_desc' => $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('products.*', DB::raw('MAX(product_variants.price) as max_price'))
                ->groupBy('products.id')
                ->orderBy('max_price', 'desc'),

            'newest' => $query->latest(),
            default => $query->latest(),
        };
    }

    private function parseException(\Exception $e): array
    {
        return [
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
        ];
    }

    public function getBestSellers(int $limit = 10)
    {
        try {
            // فرض بر این است که ستونی به نام sold_count در جدول محصولات دارید
            // اگر ندارید، می‌توانید بر اساس واریانت‌ها یا رابطه‌ی سفارشات مرتب کنید
            return $this->model->with('variants')
                ->orderBy('sold_count', 'desc')
                ->take($limit)
                ->get();
        } catch (\Exception $e) {
            $this->logError('Failed to fetch best sellers', $this->parseException($e));
            return collect(); // برگشت دادن یک کالکشن خالی برای جلوگیری از کرش ویو
        }
    }

    public function getAllProductsWithPagination(int $perPage = 10): LengthAwarePaginator
    {
        try {
            return $this->model->with('variants')->paginate($perPage);
        } catch (\Exception $e) {
            $this->logError('Failed to fetch paginated products', $this->parseException($e));
            throw new \RuntimeException('Error fetching paginated products.');
        }
    }

    public function getSimilarProducts($categoryId, $limit = 15)
    {
        try {
            return $this->model->with('variants')
                ->where('category_id', $categoryId)
                ->where('status', 1) // محصولات فعال
                ->latest()
                ->take($limit)
                ->get();
        } catch (\Exception $e) {
            $this->logError('Failed to fetch similar products', $this->parseException($e));
            return collect();
        }
    }

    public function getBoldProducts()
    {
        try {
            // فرض بر این است که ستونی برای محصولات ویژه دارید، مثلا is_featured یا مشابه
            return $this->model->with('variants')
                ->where('status', 1)
                ->latest()
                ->take(10)
                ->get();
        } catch (\Exception $e) {
            $this->logError('Failed to fetch bold products', $this->parseException($e));
            return collect();
        }
    }
}
