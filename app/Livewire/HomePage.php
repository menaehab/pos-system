<?php

namespace App\Livewire;

use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;
use App\Http\Requests\SaleRequest;
use Illuminate\Support\Facades\Session;

class HomePage extends Component
{
    use WithPagination;
    public $search = '';
    public $customer_id;
    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->sell_price,
                'quantity' => 1,
            ];
        }

        Session::put('cart', $cart);
    }
    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);
        unset($cart[$productId]);
        Session::put('cart', $cart);
    }
    public function clearCart()
    {
        Session::put('cart', []);
    }
    public function rules()
    {
        return (new SaleRequest())->rules();
    }
    public function messages()
    {
        return (new SaleRequest())->messages();
    }
    public function checkout()
    {
        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return;
        }
        $this->validate();

        $total = 0;
        $sale = Sale::create([
            'total_price' => $total,
            'user_id' => auth()->user()->id,
            'customer_id' => $this->customer_id,
    ]);

        foreach ($cart as $item) {
            $product = Product::findOrFail($item['id']);
            $sale->products()->attach($product->id, [
                'quantity' => $item['quantity'],
                'price' => $product->sell_price,
            ]);
            $product->update([
                'quantity' => $product->quantity - $item['quantity'],
            ]);
            $total += $product->sell_price * $item['quantity'];
        }
        $sale->update([
            'total_price' => $total,
        ]);
        Session::put('cart', []);
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
        ->paginate(24);
        $customers = Customer::all();
        $cart = Session::get('cart', []);
        $total = array_sum(array_column($cart, 'price')) * array_sum(array_column($cart, 'quantity'));
        return view('livewire.home-page', compact('products', 'cart', 'total', 'customers'))->layout('pages.layout', ['title' => __('keywords.home_page')]);
    }
}