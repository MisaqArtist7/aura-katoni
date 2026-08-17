<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'rating' => 'required|in:yes,no',
            'comment' => 'required|string|max:1000',
            'product_id' => 'required|exists:products,id',
        ];
    }


    public function messages()
    {
        return [
            'rating.required' => 'لطفاً وضعیت پیشنهاد را انتخاب کنید.',
            'rating.in' => 'مقدار انتخاب شده برای پیشنهاد معتبر نیست.',

            'comment.required' => 'متن دیدگاه نمی‌تواند خالی باشد.',
            'comment.string' => 'متن دیدگاه باید به صورت رشته (متن) باشد.',
            'comment.max' => 'متن دیدگاه نمی‌تواند بیشتر از ۱۰۰۰ کاراکتر باشد.',

            'product_id.required' => 'شناسه محصول الزامی است.',
            'product_id.exists' => 'محصول انتخاب شده معتبر نیست.',
        ];
    }
}
