<?php

namespace App\Livewire\Purchases;

use App\Models\Product;
use Livewire\Component;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Http\Requests\PurchaseRequest;

class PurchaseUpdate extends Component
{
    public $id;
    public $supplier_id;
    public $purchase_date;
    public $total_amount;
    public $paid_amount;
    public $due_amount;
    public $note;
    public $cartoon_quantity = false;
    public $items;
    public function mount($id)
    {
        $this->id = $id;
        $purchase = Purchase::where('id', $id)->first();
        $this->supplier_id = $purchase->supplier_id;
        $this->purchase_date = $purchase->purchase_date;
        $this->total_amount = $purchase->total_amount;
        $this->paid_amount = $purchase->paid_amount;
        $this->due_amount = $purchase->due_amount;
        $this->note = $purchase->note;
        $this->cartoon_quantity = $purchase->cartoon_quantity;
        $this->items = $purchase->items->toArray();
    }
    public function addItem()
    {
        $this->items[] = ['product_id' => '', 'quantity' => 0, 'price' => 0];
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
    public function update()
    {
        $this->validate();

        $purchase = Purchase::findOrFail($this->id);

        // 1. Restore stock before deleting old items
        foreach ($purchase->items as $oldItem) {
            $product = Product::find($oldItem->product_id);
            if ($product) {
                $quantityToRestore = $oldItem->quantity * ($oldItem->cartoon_quantity && $product->pieces_per_carton > 0 ? $product->pieces_per_carton : 1);
                $product->quantity -= $quantityToRestore;
                $product->save();
            }
        }

        // 2. Delete old items
        $purchase->items()->delete();

        // 3. Update purchase info
        $purchase->update([
            'supplier_id'   => $this->supplier_id,
            'purchase_date' => $this->purchase_date,
            'total_amount'  => $this->total_amount,
            'paid_amount'   => $this->paid_amount,
            'due_amount'    => $this->due_amount,
            'note'          => $this->note,
        ]);

        // 4. Add new items and update stock
        foreach ($this->items as $item) {
            $product = Product::find($item['product_id']);

            $purchase->items()->create([
                'product_id'       => $item['product_id'],
                'quantity'         => $item['quantity'],
                'price'            => $item['price'],
                'cartoon_quantity' => $item['cartoon_quantity'],
            ]);

            if ($product) {
                $quantityToAdd = $item['quantity'] * ($item['cartoon_quantity'] && $product->pieces_per_carton > 0 ? $product->pieces_per_carton : 1);
                $product->quantity += $quantityToAdd;
                $product->save();
            }
        }

        return redirect()->route('purchases')->with('success', __('keywords.purchase_updated_successfully'));
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
        return view('livewire.purchases.purchase-update',compact('suppliers','products'))->layout('pages.layout', [
            'title' => __('keywords.purchase_update')
        ]);
    }
}