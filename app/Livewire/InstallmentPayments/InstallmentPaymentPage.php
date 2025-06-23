<?php

namespace App\Livewire\InstallmentPayments;

use App\Models\Sale;
use Livewire\Component;
use App\Models\Customer;
use App\Models\CustomerLedger;
use App\Http\Requests\InstallmentPaymentRequest;

class InstallmentPaymentPage extends Component
{
    public $invoice_number;
    public $customer_id;
    public $amount;
    public $note;
    public function rules()
    {
        return (new InstallmentPaymentRequest())->rules();
    }
    public function messages()
    {
        return (new InstallmentPaymentRequest())->messages();
    }
    public function submit()
    {
        $validated = $this->validate();
        $sale = Sale::where('invoice_number', $validated['invoice_number'])->firstOrFail();
        CustomerLedger::create([
            'sale_id' => $sale->id,
            'customer_id' => $validated['customer_id'],
            'amount' => $validated['amount'],
            'note' => $validated['note'],
        ]);

        $this->dispatch('alert', type: 'success', message: __('keywords.installment_payment_added_successfully'));

        return redirect()->route('home');
    }
    public function render()
    {
        $customers = Customer::select('id', 'name')->orderBy('name')->get();
        return view('livewire.installment-payments.installment-payment-page', compact('customers'))->layout('pages.layout', [
            'title' => __('keywords.installment_payments'),
                ]);
    }
}