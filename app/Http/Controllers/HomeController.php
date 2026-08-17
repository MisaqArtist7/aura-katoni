<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Traits\ViewTrait;
use App\Traits\Logger;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\PageView;
use App\Classes\MakeSeo;

class HomeController extends Controller
{
    use ViewTrait;
    use Logger;
//    private $post;
    public function __construct(
        public Product $productModel,
        public Category $categoryModel,
        public Brand $brandModel,
        public ProductRepository $productRepository,
        public MakeSeo $seo
    ){}

    public function index()
    {
        try {
            $bestSellingProducts = Product::bestSellers(8)
                ->with(['variants' => function($q) {
                    $q->where('is_active', true);
                }])
                ->get();
            $latestProducts = $this->productRepository->getLatestProducts();
            $discountsProduct = $this->productRepository->getDiscountsProduct();
            $brands = $this->brandModel->all();
            $categories = $this->categoryModel->all();
            MakeSeo::indexPage();
            return view('welcome', compact('latestProducts', 'brands', 'categories', 'discountsProduct', 'bestSellingProducts'));
        } catch (\Exception $e) {
            $this->logError('Faild To Get Informations And Load Home Page', [
                'task' => [
                    'load service data' => 'faild',
                    'load work sample data' => 'faild',
                    'load blog data' => 'faild',
                ],
                'message' => $e->getMessage(),
            ]);
            return abort(500, 'خطایی در سیستم رخ داده است.');
        }
    }

    public function productSingle($id, $slug = null, MakeSeo $seo)
    {
        try {
            $categories = $this->categoryModel->all();
            $product = $this->productRepository->getProductById($id);
            $simalarProducts = $this->productRepository->getSimilarProducts($product->category_id);
            $seo->productDetailPage($id);
            return view('singleProduct', compact('product', 'simalarProducts', 'categories'));
        }catch (\Exception $e) {
            $this->logError('Faild To Get Informations And Load Product Detail Page', [
                'message'=>$e->getMessage(),
                'trace'=>$e->getTraceAsString(),
                'line'=>$e->getLine(),
            ]);
            throw new \RuntimeException('failed to get product detail page');
        }
    }

    public function blogDetails($id, $slug = null ,MakeSeo $seo)
    {
        try {
            $this->storePageView($id);
            $seo->blogDetailsPage($id);
            $details = $this->post->findOrFail($id);
            $categories = $this->post->select('category')->distinct()->get();
            $latestPost = $this->post->where('category', 'blog')->orderBy('created_at', 'desc')->take(3)->get();
            return view('blog-details', compact('details' , 'categories' , 'latestPost'));
        } catch (\Exception $e) {
            $this->logError('Faild To Get Information And Load Blog Detail Page', [
                'task' => 'Faild To Get Information And Load Blog Detail Page',
                'message' => $e->getMessage(),
            ]);
            return abort(500, 'خطایی در سیستم رخ داده است.');
        }
    }

    public function getCarts()
    {
        $cart = session()->get('cart', []);

        $totalQuantity = 0;
        $totalPrice = 0;
        $categories = $this->post->select('category')->distinct()->get();
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
            $totalPrice += $item['quantity'] * $item['price'];
        }

        return view('cart.index', [
            'categories' => $categories,
            'cartItems' => $cart,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ]);
    }


    public function shop(MakeSeo $seo, Request $request)
    {
        try {
            $filters = [
                'sort' => $request->get('sort'),
                'category' => $request->get('category'),
                'brands' => $request->get('brands', []),
                'price_min' => $request->get('price_min'),
                'price_max' => $request->get('price_max'),
                'onlyAvailable' => $request->boolean('onlyAvailable'),
            ];


            $results = $this->productRepository->getAllWithFilters($filters);

           $categories = $this->categoryModel->select('name', 'id')->get();
           $brands = $this->brandModel->select('name', 'id')->get();
            return view('shop', compact(
                'results',
                'filters',
                'categories',
                'brands'
            ));

        } catch (\Exception $e) {
            $this->logError('failed to get search result', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTrace()
            ]);

            return redirect()->back()->with('error', 'در هنگام دریافت اطلاعات خطایی رخ داده است'.$e->getMessage());
        }
    }


    public function categorySingle(Request $request,$id, $slug)
    {
        try {

            $category = Category::findOrFail($id);

//            $this->seo->categoryDetailPage($id);

            // **3. جمع‌آوری فیلترها**
            $filters = [
                'sort'          => $request->get('sort'),
                'brands'        => $request->get('brands', []),
                'price_min'     => $request->get('price_min'),
                'price_max'     => $request->get('price_max'),
                'onlyAvailable' => $request->boolean('onlyAvailable'),
            ];

            // **4. شروع Query اصلی**
            $query = Product::query()
                ->where('category_id', $id); // دسته‌بندی ثابت و غیرقابل فیلتر

            // **5. فیلتر برند**
            if (!empty($filters['brands']) && is_array($filters['brands'])) {
                $query->whereIn('brand_id', $filters['brands']);
            }

            // **6. فیلتر قیمت**
            if (!empty($filters['price_min'])) {
                $query->where('price', '>=', $filters['price_min']);
            }

            if (!empty($filters['price_max'])) {
                $query->where('price', '<=', $filters['price_max']);
            }

            // **7. فقط کالاهای موجود**
            if ($filters['onlyAvailable']) {
                $query->where('quantity', '>', 0);
            }

            // **8. مرتب‌سازی**
            switch ($filters['sort']) {
                case 'best_selling':
                    $query->orderBy('sold_count', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }

            // **9. صفحه‌بندی**
            $results = $query->paginate(12)->appends($filters);

            // **10. فهرست دسته‌ها و برندها**
            $categories = Category::select('name', 'id')->get();
            $brands     = Brand::select('name', 'id')->get();

            // **11. خروجی نهایی**
            return view('category-results', compact(
                'results',
                'filters',
                'categories',
                'brands',
                'category'
            ));

        } catch (\Exception $e) {

            dd(
                'ERROR FILE: '.$e->getFile(),
                'ERROR LINE: '.$e->getLine(),
                'ERROR MESSAGE: '.$e->getMessage()
            );

             return redirect()->back()->with('error', 'خطا در دریافت اطلاعات');
        }
    }


    public function aboutUs()
    {
        $categories = Category::all();
        return view('about-us', compact('categories'));
    }

    public function discountProducts(Request $request)
    {
        try {
            $filters = [
                'sort' => $request->get('sort'),
                'category' => $categoryId ?? $request->get('category'),
                'brandFilter' => $request->get('brands', []),
                'price_min' => $request->get('price_min'),
                'price_max' => $request->get('price_max'),
                'onlyAvailable' => $request->has('onlyAvailable')
            ];

            $results = $this->productRepository->getDiscountsProduct();

            $categories = $this->categoryModel->select('name', 'id')->get();
            $brands = $this->brandModel->select('name', 'id')->get();
            return view('discountsProducts', compact(
                'results',
                'filters',
                'categories',
                'brands'
            ));

        } catch (\Exception $e) {
            $this->logError('failed to get search result', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTrace()
            ]);

            return redirect()->back()->with('error', 'در هنگام دریافت اطلاعات خطایی رخ داده است');
        }
    }



}
