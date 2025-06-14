<?php

namespace App\Livewire\Purchases;

use Livewire\Component;
use App\Models\Purchase;
use Livewire\WithPagination;

class PurchasePage extends Component
{
    use WithPagination;

    protected $listeners = ['purchaseRefresh' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $purchases = Purchase::where('total_amount', 'like', "%{$this->search}%")
            ->orWhere('purchase_date', 'like', "%{$this->search}%")
            ->orWhereHas('supplier', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);
        return view('livewire.purchases.purchase-page', compact('purchases'))->layout('pages.layout', [
            'title' => __('keywords.purchases')
        ]);
    }
}