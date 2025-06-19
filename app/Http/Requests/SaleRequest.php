<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1',
            'customer_id' => 'nullable|exists:customers,id',
        ];
    }
    public function messages(): array
    {
        return [
            'products.required' => __('keywords.products_required'),
            'products.*.id.required' => __('keywords.product_id_required'),
            'products.*.id.exists' => __('keywords.product_id_exists'),
            'products.*.quantity.required' => __('keywords.quantity_required'),
            'products.*.quantity.numeric' => __('keywords.quantity_numeric'),
            'products.*.quantity.min' => __('keywords.quantity_min'),
            'customer_id.exists' => __('keywords.customer_id_exists'),
        ];
    }
}