<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * اجازه دسترسی به این ریکوئست
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * قوانین اعتبارسنجی
     */
    public function rules(): array
    {
        return [
            // اطلاعات پایه محصول
            'name'         => 'required|string|max:255',
            'title'        => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'brand_id'     => 'required|exists:brands,id',
            'description'  => 'nullable|string',

            // اعتبارسنجی تصاویر
            'images'       => 'nullable|array',
            'images.*'     => 'image|mimes:jpeg,png,jpg,webp|max:2048',

            // اعتبارسنجی ویژگی‌ها (مشخصات فنی)
            'features'         => 'nullable|array',
            'features.*.name'  => 'required_with:features.*.value|string|max:255',
            'features.*.value' => 'required_with:features.*.name|string|max:255',

        ];
    }

    /**
     * پیام‌های فارسی برای خطاها
     */
    public function messages(): array
    {
        return [
            // پیام‌های محصول
            'name.required'        => 'وارد کردن نام محصول الزامی است.',
            'title.required'       => 'عنوان سئو برای محصول الزامی است.',
            'category_id.required' => 'لطفاً یک دسته‌بندی انتخاب کنید.',
            'category_id.exists'   => 'دسته‌بندی انتخاب شده در سیستم وجود ندارد.',
            'brand_id.required'    => 'انتخاب برند برای محصول الزامی است.',
            'brand_id.exists'      => 'برند انتخاب شده معتبر نیست.',

            // پیام‌های تصاویر
            'images.array'         => 'فرمت ارسال تصاویر صحیح نیست.',
            'images.*.image'       => 'فایل ارسالی حتماً باید از نوع تصویر باشد.',
            'images.*.mimes'       => 'تصاویر فقط می‌توانند با فرمت‌های jpeg, png, jpg, webp باشند.',
            'images.*.max'         => 'حجم هر تصویر نباید بیشتر از ۲ مگابایت باشد.',

            // پیام‌های ویژگی‌ها
            'features.*.name.required_with'  => 'نام ویژگی نمی‌تواند خالی باشد.',
            'features.*.value.required_with' => 'مقدار ویژگی نمی‌تواند خالی باشد.',


        ];
    }



}
