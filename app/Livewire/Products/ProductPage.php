<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{
    use WithPagination;

    protected $listeners = ['productRefresh' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = Product::where('name', 'like', "%{$this->search}%")
            ->orWhere('barcode', 'like', "%{$this->search}%")
            ->orWhereHas('subCategory', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);
        return view('livewire.products.product-page', compact('products'))->layout('pages.layout', [
            'title' => __('keywords.products')
        ]);
    }
}