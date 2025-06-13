<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'barcode' => 'nullable|string|max:255',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'pieces_per_carton' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('keywords.name_required'),
            'sub_category_id.required' => __('keywords.sub_category_required'),
            'barcode.required' => __('keywords.barcode_required'),
            'buy_price.required' => __('keywords.buy_price_required'),
            'sell_price.required' => __('keywords.sell_price_required'),
            'quantity.required' => __('keywords.quantity_required'),
            'pieces_per_carton.required' => __('keywords.pieces_per_carton_required'),
        ];
    }
}