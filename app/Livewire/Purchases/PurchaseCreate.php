<?php

namespace App\Livewire\Purchases;

use App\Models\Product;
use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Http\Requests\PurchaseRequest;

class PurchaseCreate extends Component
{
    public $supplier_id;
    public $purchase_date;
    public $total_amount;
    public $paid_amount;
    public $due_amount;
    public $note;
    public $cartoon_quantity = false;
    public $items = [
        ['product_id' => '', 'quantity' => 0, 'price' => 0, 'cartoon_quantity' => false],
    ];
    public function addItem()
    {
        $this->items[] = ['product_id' => '', 'quantity' => 0, 'price' => 0, 'cartoon_quantity' => false];
    }
    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }
    public function updatedSupplierId()
    {
            $this->reset('items');
    }
    public function rules()
    {
        return (new PurchaseRequest())->rules();
    }
    public function messages()
    {
        return (new PurchaseRequest())->messages();
    }
    public function updated()
    {
        $this->validate();
    }
    public function store()
    {
        $this->validate();

        $purchase = Purchase::create([
            'supplier_id' => $this->supplier_id,
            'purchase_date' => $this->purchase_date,
            'total_amount' => $this->total_amount,
            'paid_amount' => $this->paid_amount,
            'due_amount' => $this->due_amount,
            'note' => $this->note,
        ]);

        foreach ($this->items as $item) {
            $product = Product::where('id',$item['product_id'])->first();
            $purchase->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'cartoon_quantity' => $item['cartoon_quantity'] ?? false,
            ]);

            $product->update([
                'quantity' => $product->quantity + $item['quantity'] * (($item['cartoon_quantity'] ?? false) && $product->pieces_per_carton > 0 ? $product->pieces_per_carton : 1),
            ]);
            $product->save();
        }
        return redirect()->route('purchases')->with('success', __('keywords.purchase_added_successfully'));

    }

    public function render()
    {
        $suppliers = Supplier::all();
        $products = Product::whereHas('subCategory', function ($query) {
            $query->whereHas('category', function ($query) {
                $query->whereHas('supplier', function ($query) {
                    $query->where('id', $this->supplier_id);
                });
            });
        })->get();
        return view('livewire.purchases.purchase-create', compact('suppliers', 'products'))->layout('pages.layout', [
            'title' => __('keywords.purchase_create')
        ]);
    }
}