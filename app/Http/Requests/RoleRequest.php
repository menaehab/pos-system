<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('keywords.name_is_required'),
            'name.string' => __('keywords.name_must_be_a_string'),
            'name.max' => __('keywords.name_must_not_be_greater_than_255_characters'),
            'permissions.required' => __('keywords.permissions_is_required'),
            'permissions.array' => __('keywords.permissions_must_be_an_array'),
            'permissions.*.exists' => __('keywords.permissions_must_exist'),
        ];
    }
}
