<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
class ProductShow extends Component
{
    public $slug;
    public $product;
    #[On('showModal')]
    public function openShowModal($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $slug)->firstOrFail();
        $this->dispatch('show-modal');
    }
    public function render()
    {
        return view('livewire.products.product-show');
    }
}
