<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'phone' => 'nullable|string|min:11|max:11',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب أن يكون نصاً',
            'name.max' => 'الاسم يجب أن لا يتجاوز 255 حرف',
            'phone.string' => 'الهاتف يجب أن يكون نصاً',
            'phone.min' => 'الهاتف يجب أن يحتوي على 11 رقم',
            'phone.max' => 'الهاتف يجب أن يحتوي على 11 رقم',
        ];
    }
}
