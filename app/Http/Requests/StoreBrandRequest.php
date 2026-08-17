<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'title'       => ['required', 'string', 'max:255'], // به required تغییر یافت تا با فرم هماهنگ شود
            'logo'        => ['nullable', 'image', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'فیلد نام برند الزامی است.',
            'name.string'        => 'نام برند باید یک رشته متنی باشد.',
            'name.max'           => 'نام برند نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'description.string' => 'توضیحات باید یک متن معتبر باشد.',

            'title.required'     => 'فیلد عنوان برند الزامی است.', // این پیام اضافه شد
            'title.string'       => 'عنوان باید یک رشته متنی باشد.',
            'title.max'          => 'عنوان نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'logo.image'         => 'فایل تصویر باید از نوع عکس باشد.',
            'logo.max'           => 'حجم تصویر نباید بیشتر از ۲ مگابایت باشد.',
        ];
    }
}
