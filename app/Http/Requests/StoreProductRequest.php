<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'description' => 'nullable|string',

            // ✅ این قانون رو به همین صورت نگه دار (آرایه)
            'images' => 'required|array|min:1|max:10',
            'images.*' => 'string', // چون مسیرهای ذخیره شده هستند

            'variants' => 'required|array|min:1',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock' => 'required|integer|min:0',
            'variants.*.color' => 'nullable|string|max:50',
            'variants.*.size' => 'nullable|string|max:50',

            'features' => 'nullable|array',
            'features.*.name' => 'required_with:features.*.value',
            'features.*.value' => 'required_with:features.*.name',
        ];
    }

    // ✅ این متد رو اضافه کن تا اگر JSON اومد به آرایه تبدیل بشه
    protected function prepareForValidation()
    {
        // اگر images از نوع string بود (JSON)، تبدیل به آرایه کن
        if ($this->has('images') && is_string($this->images)) {
            $decoded = json_decode($this->images, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $this->merge([
                    'images' => $decoded
                ]);
            }
        }

        // پردازش features
        if ($this->features) {
            $this->merge([
                'features' => collect($this->features)
                    ->filter(fn($f) => !empty($f['name']) && !empty($f['value']))
                    ->values()
                    ->toArray()
            ]);
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'نام محصول الزامی است.',
            'title.required' => 'عنوان محصول الزامی است.',
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'brand_id.required' => 'انتخاب برند الزامی است.',

            'images.required' => 'حداقل باید یک تصویر آپلود کنید.',
            'images.array' => 'فرمت تصاویر نامعتبر است.',
            'images.min' => 'حداقل باید یک تصویر آپلود کنید.',
            'images.max' => 'حداکثر می‌توانید ۱۰ تصویر آپلود کنید.',
            'images.*.string' => 'فرمت تصویر نامعتبر است.',

            'variants.required' => 'حداقل باید یک واریانت ثبت کنید.',
            'variants.*.price.required' => 'قیمت واریانت الزامی است.',
            'variants.*.stock.required' => 'موجودی واریانت الزامی است.',
            'variants.*.price.numeric' => 'قیمت باید عدد باشد.',
            'variants.*.stock.integer' => 'موجودی باید عدد صحیح باشد.',
        ];
    }
}