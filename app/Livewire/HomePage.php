<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    public $search = '';
    public function updatedSearch()
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
        ->orWhereHas('subCategory.category', function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        })
        ->orWhereHas('subCategory.category.supplier', function ($query) {
            $query->where('name', 'like', "%{$this->search}%");
        })
        ->latest()
        ->paginate(10);
        return view('livewire.home-page', compact('products'))->layout('pages.layout', ['title' => __('keywords.home_page')]);
    }
}