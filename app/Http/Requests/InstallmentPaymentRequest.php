<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallmentPaymentRequest extends FormRequest
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
            'invoice_number' => 'required|exists:sales,invoice_number',
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'invoice_number.required' => 'رقم الفاتورة مطلوب',
            'invoice_number.exists' => 'رقم الفاتورة غير موجود',
            'customer_id.required' => 'العميل مطلوب',
            'customer_id.exists' => 'العميل غير موجود',
            'amount.required' => 'المبلغ مطلوب',
            'amount.numeric' => 'المبلغ يجب أن يكون رقم',
            'note.string' => 'ملاحظات يجب أن تكون نصاً',
        ];
    }
}
