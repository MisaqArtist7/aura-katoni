<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Logger;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    use Logger;
    public function __construct(public Product $productModel, public Category  $categoryModel, public Brand $brandModel){}

    public function index(Request $request)
    {
        try {
            $query        = $request->get('query');
            $sort         = $request->get('sort');
            $category     = $request->get('category');
            $brandFilter  = $request->get('brands', []);
            $price_min    = $request->get('price_min');
            $price_max    = $request->get('price_max');
            $onlyAvailable = $request->has('onlyAvailable');

            $results = $this->productModel->query();

            if ($query) {
                $results->where(function($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->orWhere('price', 'like', "%{$query}%")
                        ->orWhere('title', 'like', "%{$query}%");
                });
            }

            if ($category) {
                $results->where('category_id', $category);
            }

            if (!empty($brandFilter) && is_array($brandFilter)) {
                $results->whereIn('brand_id', $brandFilter);
            }

            if ($price_min) {
                $results->where('price', '>=', $price_min);
            }
            if ($price_max) {
                $results->where('price', '<=', $price_max);
            }

            if ($onlyAvailable) {
                $results->where('quantity', '>', 0);
            }

            switch ($sort) {
                case 'best_selling':
                    $results->orderBy('sold_count', 'desc');
                    break;
                case 'price_asc':
                    $results->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $results->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $results->orderBy('created_at', 'desc');
                    break;
                default:
                    $results->latest();
                    break;
            }

            $results = $results->paginate(32)->appends($request->query());

            $categories = $this->categoryModel
                ->select('name', 'id')
                ->whereNull('parent_id')
                ->get();

            $brands = $this->brandModel
                ->select('name', 'id')
                ->get();

            return view('searchResult', compact(
                'results',
                'query',
                'sort',
                'category',
                'brandFilter',
                'price_min',
                'price_max',
                'onlyAvailable',
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
