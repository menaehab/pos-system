<?php

namespace App\Livewire\Sales;

use App\Models\Sale;
use Livewire\Component;

class SaleShow extends Component
{
    public $sale;

    public function mount($invoice_number)
    {
        $this->sale = Sale::with('saleItems.product')->where('invoice_number', $invoice_number)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.sales.sale-show', [
            'sale' => $this->sale
        ])->layout('pages.layout', [
            'title' => __('keywords.sales')
        ]);
    }
}
