<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVariantrequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateVariantRequest;
use App\Traits\Logger;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Str;

class VariantController extends Controller
{
    use Logger;
    public function __construct(public ProductVariant $model){}

    public function store(StoreVariantrequest $request)
    {
        try {
            $variant = $request->validated();
            $variant['sku'] = 'PRD-' . $variant['product_id'] . '-' . ($variant['product_id'] + 1) . '-' . strtoupper(Str::random(3));
            $this->model->create($variant);
            return redirect()->back()->with('success', 'تنوع با موفقیت ذخیره شد');
        }catch (\Exception $e){
            $this->logError('Failed to create variant', [
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'در هنگاه ذخیره سازی مشکلی رخ داده است'.$e->getMessage());
        }
    }

    public function update(UpdateVariantRequest $request, ProductVariant $variant){
        try {
            $variant->update($request->validated());
            return redirect()->back()->with('success', 'عملیات به روز رسانی تنوع با موفقیت انجام شد');
        }catch (\Exception $e){
            $this->logError('failed to update variant', [
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'به روز رسانی تنوع با مشکل رو به رو شد'.$e->getMessage());
        }
    }

    public function destroy(ProductVariant $variant)
    {
        try {
            $variant->delete();
            return redirect()->back()->with('success', 'عملیات حذف تنوع با موفقیت انجام شد');
        }catch (\Exception $e){
            $this->logError('failed to delete variant', [
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'عملیات حذف تنوع با مشکل روبه رو شد'.$e->getMessage());
        }
    }
}
