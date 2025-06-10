<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('keywords.name_is_required'),
            'name.string' => __('keywords.name_must_be_a_string'),
            'name.max' => __('keywords.name_must_not_be_greater_than_255_characters'),
            'supplier_id.required' => __('keywords.supplier_is_required'),
            'supplier_id.exists' => __('keywords.supplier_not_found'),
        ];
    }
}
