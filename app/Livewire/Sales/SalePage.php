<?php

namespace App\Livewire\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class SalePage extends Component
{
    use WithPagination;

    protected $listeners = ['saleRefresh' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sales = Sale::where('total_price', 'like', "%{$this->search}%")
            ->orWhere('invoice_number', 'like', "%{$this->search}%")
            ->orWhereHas('customer', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.sales.sale-page', compact('sales'))->layout('pages.layout', [
            'title' => __('keywords.sales')
        ]);
    }
}