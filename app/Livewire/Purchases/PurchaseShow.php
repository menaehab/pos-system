<?php

namespace App\Livewire\Purchases;

use Livewire\Component;
use App\Models\Purchase;

class PurchaseShow extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $purchase = Purchase::where('id', $this->id)->firstOrFail();
        return view('livewire.purchases.purchase-show', compact('purchase'))->layout('pages.layout', [
            'title' => __('keywords.purchase_details')
        ]);
    }
}