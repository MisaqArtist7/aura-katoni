<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Rule رو اضافه می‌کنیم

class StoreColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // یا هر منطق دیگری برای احراز هویت
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255', // اضافه کردن max برای نام رنگ
            'code' => [
                'required',
                'string',
                'max:7', // کد رنگ hex معمولاً 7 کاراکتر است (#RRGGBB)
                'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', // ولیدیشن فرمت کد هگزادسیمال
                Rule::unique('colors', 'code')->ignore($this->color), // جلوگیری از تکرار کد رنگ، اگر در حال آپدیت هستیم، کد فعلی را نادیده می‌گیرد
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'نام رنگ الزامی است.',
            'name.string' => 'نام رنگ باید به صورت متنی باشد.',
            'name.max' => 'نام رنگ نمی‌تواند بیشتر از ۲۵۵ کاراکتر باشد.',

            'code.required' => 'کد رنگ الزامی است.',
            'code.string' => 'کد رنگ باید به صورت متنی باشد.',
            'code.max' => 'کد رنگ باید حداکثر ۷ کاراکتر باشد (مثلاً #RRGGBB).',
            'code.regex' => 'فرمت کد رنگ معتبر نیست. لطفاً از فرمت هگزادسیمال (مثلاً #FF5733) استفاده کنید.',
            'code.unique' => 'این کد رنگ قبلاً ثبت شده است. لطفاً یک کد رنگ منحصر به فرد وارد کنید.',
        ];
    }
}
