<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Traits\Logger;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mockery\Exception;

class Productcontroller extends Controller
{
    use Logger;
    public function __construct(public Product $model)
    {
    }

    public function index()
    {
        $colors =
        $products = $this->model->orderByDesc('created_at')->paginate(10);
        return view('Admin.manage-product', compact('products'));
    }

    public function create()
    {
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('Admin.createProduct',compact('categories','brands', 'colors'));
    }


    public function store(StoreProductRequest $request)
    {
//        dd($request->all());
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            // ✅ فقط نام عکس‌هایی که قبلاً آپلود شده‌اند رو دریافت کن
            $imagePaths = $request->input('images', []); // این آرایه از فرم میاد

            if (empty($imagePaths)) {
                throw new \Exception('حداقل یک تصویر باید آپلود شود.');
            }

            // ایجاد محصول
            $product = $this->model->create([
                'name' => $validated['name'],
                'title' => $validated['title'],
                'description' => $validated['description'],
                'category_id' => $validated['category_id'],
                'brand_id' => $validated['brand_id'],
                'images' => $imagePaths, // مسیرهای ذخیره شده
                'features' => $validated['features'] ?? [],
                'status' => 1,
            ]);

            if (!$product) {
                throw new \Exception('ایجاد محصول با شکست مواجه شد.');
            }

            // ایجاد واریانت‌ها
            foreach ($validated['variants'] as $index => $variantData) {
                $product->variants()->create([
                    'sku' => 'PRD-' . $product->id . '-' . ($index + 1) . '-' . strtoupper(Str::random(3)),
                    'price' => $variantData['price'],
                    'stock' => $variantData['stock'],
                    'color' => $variantData['color'],
                    'size' => $variantData['size'],
                    'is_active' => true,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'محصول با موفقیت ثبت شد.');

        } catch(\Exception $e){
            DB::rollBack();
            \Log::error('Failed to save product', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // در کنترلر ProductController
    public function uploadImages(Request $request)
    {
        try {
            $request->validate([
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            $uploadedPaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $uploadedPaths[] = $path;
            }

            return response()->json([
                'success' => true,
                'paths' => $uploadedPaths,
                'message' => 'تصاویر با موفقیت آپلود شدند.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در آپلود تصاویر: ' . $e->getMessage()
            ], 500);
        }
    }
    private function getUserFriendlyErrorMessage(\Exception $e): string
    {
        $message = $e->getMessage();

        // خطاهای مربوط به آپلود تصویر
        if (strpos($message, 'آپلود تصویر') !== false) {
            return 'خطا در آپلود تصاویر. لطفاً مجدداً تلاش کنید.';
        }

        // خطاهای مربوط به دیتابیس
        if (strpos($message, 'SQL') !== false || strpos($message, 'database') !== false) {
            return 'خطا در ارتباط با پایگاه داده. لطفاً چند لحظه دیگر تلاش کنید.';
        }

        // خطاهای مربوط به اعتبارسنجی
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            return 'اطلاعات وارد شده معتبر نیست. لطفاً دقت کنید.';
        }

        // خطای عمومی
        return 'خطایی در ثبت محصول رخ داده است: ' . $message;
    }

    public function updateQuantity(Request $request,$id){
        try {
            $product = $this->model->find($id);
            $product->quantity = $request->quantity;
            $product->save();
            return redirect()->back()->with('success', 'موجودی با موفقیت ثبت شد');
        }catch (\Exception $exception){
            $this->logError('failed to update product', [
                'exception' => $exception->getMessage(),
            ]);
            return redirect()->back()->with('error', 'عملیات با خطا با مواجه شد');
        }
    }

    public function updateDiscountPrice(Request $request,$id){
        try {
            $product = $this->model->find($id);
            $product->discount_price = $request->discount_price;
            $product->save();
            return redirect()->back()->with('success', 'تخفیف با موفقیت ثبت شد');

        }catch (\Exception $exception){
            $this->logError('failed to update product', [
                'exception' => $exception->getMessage(),
                'errorCode' => $exception->getCode(),
            ]);
            return redirect()->back()->with('error', 'عملیات با خطا با مواجه شد');

        }
    }

    public function delete($id)
    {
        try {
            $product = $this->model->find($id);
            $product->delete();
            return redirect()->back()->with('success', 'محصول با موفقیت حذف شد');
        }catch (\Exception $exception){
            $this->logError('failed to delete product', [
                'exception' => $exception->getMessage(),
                'errorCode' => $exception->getCode(),
            ]);
            return redirect()->back()->with('error', 'عملیات با خطا با مواجه شد');
        }
    }

    public function edit($id)
    {
        $colors = Color::all();
        $categories = Category::all();
        $brands = Brand::all();
        $product = $this->model->find($id);
        return view('Admin.edit-product', compact('product', 'categories', 'brands','colors'));

    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $validated = $request->validated();

            $product = $this->model->findOrFail($id);

            if ($request->hasFile('images')) {
                $imagePaths = [];

                foreach ($request->file('images') as $image) {
                    if ($image->isValid()) {
                        $path = $image->store('products', 'public');
                        $imagePaths[] = $path;
                    }
                }

                $validated['images'] = implode('-', $imagePaths);
            } else {
                unset($validated['images']); // اگه عکس جدید نیومد، عکس قبلی حفظ میشه
            }

            if (isset($validated['features']) && is_array($validated['features'])) {
                $validated['features'] = json_encode($validated['features'], JSON_UNESCAPED_UNICODE);
            }

            $product->update($validated);

            return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت بروزرسانی شد.');
        } catch (\Exception $exception) {
            $this->logError('failed to update product', [
                'exception' => $exception->getMessage(),
                'errorCode' => $exception->getCode(),
            ]);

            return redirect()->back()->withErrors('در بروزرسانی محصول خطایی رخ داد. لطفاً دوباره تلاش کنید.');
        }
    }



}
