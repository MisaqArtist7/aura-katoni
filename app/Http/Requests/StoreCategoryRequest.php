<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
//            'slug'        => ['required', 'string', 'max:255', 'unique:categories,slug'],
            'description' => ['nullable', 'string'],
            'parent_id'   => ['nullable', 'integer', 'exists:categories,id'],
            'title'       => ['nullable', 'string', 'max:255'],
            'image'       => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp,avif', 'max:2048'],
            'icon'        => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'فیلد نام دسته‌بندی الزامی است.',
            'name.string'          => 'نام دسته‌بندی باید یک رشته متنی باشد.',
            'name.max'             => 'نام دسته‌بندی نباید بیشتر از ۲۵۵ کاراکتر باشد.',


            'description.string'   => 'توضیحات باید یک متن معتبر باشد.',

            'title.string'         => 'عنوان باید یک رشته متنی باشد.',
            'title.max'            => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'image.image'          => 'فایل تصویر باید از نوع عکس باشد.',
            'image.max'            => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',

            'icon.string'          => 'آیکن باید یک رشته متنی باشد.',
            'icon.max'             => 'آیکن نباید بیشتر از ۲۵۵ کاراکتر باشد.',
        ];
    }

}
