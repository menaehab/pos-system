<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'supplier_id' => 'required|exists:suppliers,id',
            'purchase_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'paid_amount' => 'required|numeric',
            'due_amount' => 'required|numeric',
            'note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|numeric',
            'items.*.price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'supplier_id.required' => __('keywords.supplier_is_required'),
            'supplier_id.exists' => __('keywords.supplier_not_found'),
            'purchase_date.required' => __('keywords.purchase_date_is_required'),
            'purchase_date.date' => __('keywords.purchase_date_must_be_a_date'),
            'total_amount.required' => __('keywords.total_amount_is_required'),
            'total_amount.numeric' => __('keywords.total_amount_must_be_a_number'),
            'paid_amount.required' => __('keywords.paid_amount_is_required'),
            'paid_amount.numeric' => __('keywords.paid_amount_must_be_a_number'),
            'due_amount.required' => __('keywords.due_amount_is_required'),
            'due_amount.numeric' => __('keywords.due_amount_must_be_a_number'),
            'note.string' => __('keywords.note_must_be_a_string'),
            'items.required' => __('keywords.items_is_required'),
            'items.array' => __('keywords.items_must_be_an_array'),
            'items.*.product_id.required' => __('keywords.product_is_required'),
            'items.*.product_id.exists' => __('keywords.product_not_found'),
            'items.*.quantity.required' => __('keywords.quantity_is_required'),
            'items.*.quantity.numeric' => __('keywords.quantity_must_be_a_number'),
            'items.*.price.required' => __('keywords.price_is_required'),
            'items.*.price.numeric' => __('keywords.price_must_be_a_number'),
        ];
    }
}