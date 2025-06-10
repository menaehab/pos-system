<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('keywords.name_required'),
            'name.string' => __('keywords.name_string'),
            'name.max' => __('keywords.name_max'),
            'category_id.required' => __('keywords.category_id_required'),
            'category_id.exists' => __('keywords.category_id_exists'),
        ];
    }
}
