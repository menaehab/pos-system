<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductDelete extends Component
{
    public $slug = null;

    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $this->slug = $slug;
        $this->dispatch('delete-modal');
    }

    public function deleteProduct()
    {
        Product::where('slug', $this->slug)->firstOrFail()->delete();

        $this->reset('slug');
        $this->dispatch('close-modal');
        $this->dispatch('productRefresh');

        return session()->flash('success', __('keywords.product_deleted_successfully'));
    }
    public function render()
    {
        return view('livewire.products.product-delete');
    }
}