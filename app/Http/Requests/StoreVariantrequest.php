<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariantrequest extends FormRequest
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
            'product_id' => 'exists:products,id',
            'size'=> 'required|numeric',
            'color'=>'required|string|max:255',
            'price'=>'required|numeric',
            'discount_price'=>'nullable|numeric',
            'stock'=>'required|numeric',
        ];
    }
}
