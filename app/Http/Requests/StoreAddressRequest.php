<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'user_id'=>'required|exists:users,id',
            'name'=>'required|string|max:255',
            'family_name'=>'required|string|max:255',
            'telephone'=>'required|string|max:12',
            'province'=>'required|string|max:255',
            'city'=>'required|string|max:255',
            'full_address'=>'required|string|max:255',
            'postal_code'=>'required|string|max:12',
            'description'=>'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'وارد کردن شناسه کاربر الزامی است.',
            'user_id.exists' => 'شناسه کاربر معتبر نیست.',

            'name.required' => 'وارد کردن نام الزامی است.',
            'name.string' => 'نام باید یک متن باشد.',
            'name.max' => 'نام نباید بیش از ۲۵۵ کاراکتر باشد.',

            'family_name.required' => 'وارد کردن نام خانوادگی الزامی است.',
            'family_name.string' => 'نام خانوادگی باید یک متن باشد.',
            'family_name.max' => 'نام خانوادگی نباید بیش از ۲۵۵ کاراکتر باشد.',

            'telephone.required' => 'وارد کردن شماره تلفن الزامی است.',
            'telephone.string' => 'شماره تلفن باید یک متن باشد.',
            'telephone.max' => 'شماره تلفن نباید بیش از ۱۲ کاراکتر باشد.',

            'province.required' => 'وارد کردن استان الزامی است.',
            'province.string' => 'استان باید یک متن باشد.',
            'province.max' => 'نام استان نباید بیش از ۲۵۵ کاراکتر باشد.',

            'city.required' => 'وارد کردن شهر الزامی است.',
            'city.string' => 'شهر باید یک متن باشد.',
            'city.max' => 'نام شهر نباید بیش از ۲۵۵ کاراکتر باشد.',

            'full_address.required' => 'وارد کردن آدرس کامل الزامی است.',
            'full_address.string' => 'آدرس کامل باید یک متن باشد.',
            'full_address.max' => 'آدرس کامل نباید بیش از ۲۵۵ کاراکتر باشد.',

            'postal_code.required' => 'وارد کردن کد پستی الزامی است.',
            'postal_code.string' => 'کد پستی باید یک متن باشد.',
            'postal_code.max' => 'کد پستی نباید بیش از ۱۲ کاراکتر باشد.',

            'description.string' => 'توضیحات باید یک متن باشد.',
            'description.max' => 'توضیحات نباید بیش از ۵۰۰ کاراکتر باشد.',
        ];
    }

}
