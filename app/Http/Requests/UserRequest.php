<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public $id;
    public function __construct($id = null)
    {
        $this->id = $id;
    }

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
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
            'password' => $this->id ? 'nullable' : 'required' . '|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('keywords.name_is_required'),
            'email.required' => __('keywords.email_is_required'),
            'email.email' => __('keywords.email_must_be_valid'),
            'email.unique' => __('keywords.email_must_be_unique'),
            'password.required' => __('keywords.password_is_required'),
            'password.min' => __('keywords.password_must_be_at_least_8_characters'),
            'password.confirmed' => __('keywords.password_must_match'),
            'role_id.required' => __('keywords.role_is_required'),
            'role_id.exists' => __('keywords.role_must_exist'),
            'password_confirmation.required' => __('keywords.password_confirmation_is_required'),
            'password_confirmation.confirmed' => __('keywords.password_confirmation_must_match'),
        ];
    }
}