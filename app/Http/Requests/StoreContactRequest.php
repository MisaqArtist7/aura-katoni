<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return[
            'name.required'   => 'وارد کردن نام الزامی است.',
            'name.string'     => 'نام باید به صورت متن باشد.',
            'name.max'        => 'نام نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'number.required' => 'وارد کردن شماره الزامی است.',
            'number.string'   => 'شماره باید به صورت متن باشد.',
            'number.max'      => 'شماره نباید بیشتر از ۲۵۵ کاراکتر باشد.',

            'message.required' => 'وارد کردن پیام الزامی است.',
            'message.string'   => 'پیام باید به صورت متن باشد.',
            'message.max'      => 'پیام نباید بیشتر از ۲۵۵ کاراکتر باشد.',
        ];
    }
}
