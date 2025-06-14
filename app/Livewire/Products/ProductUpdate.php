<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Http\Requests\ProductRequest;

class ProductUpdate extends Component
{
    public $name = null;
    public $slug = null;
    public $sub_category_id = null;
    public $barcode = null;
    public $buy_price = null;
    public $sell_price = null;
    public $quantity = null;
    public $pieces_per_carton = null;
    public $category_id = null;
    public $supplier_id = null;
    public $showCategories = false;
    public $showSubCategories = false;
    protected function rules()
    {
        return (new ProductRequest())->rules();
    }

    protected function messages()
    {
        return (new ProductRequest())->messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    #[On('editModal')]
    public function openEditModal($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $this->slug = $product->slug;
        $this->name = $product->name;
        $this->sub_category_id = $product->sub_category_id;
        $this->barcode = $product->barcode;
        $this->buy_price = $product->buy_price;
        $this->sell_price = $product->sell_price;
        $this->quantity = $product->quantity;
        $this->pieces_per_carton = $product->pieces_per_carton;
        $this->category_id = $product->subCategory->category_id;
        $this->supplier_id = $product->subCategory->category->supplier_id;
        $this->showCategories = true;
        $this->showSubCategories = true;


        $this->dispatch('edit-modal');
    }

    public function editProduct()
    {
        $this->validate();

        $product = Product::where('slug', $this->slug)->firstOrFail();
        if(!$this->barcode){
            $this->barcode = rand(100000000000,999999999999);
        }
        $product->update([
            'name' => $this->name,
            'sub_category_id' => $this->sub_category_id,
            'barcode' => $this->barcode,
            'buy_price' => $this->buy_price,
            'sell_price' => $this->sell_price,
            'quantity' => $this->quantity,
            'pieces_per_carton' => $this->pieces_per_carton,
        ]);

        $this->reset();
        $this->resetValidation();

        $this->dispatch('close-modal');
        $this->dispatch('productRefresh');
        session()->flash('success', __('keywords.product_edited_successfully'));
    }
    public function updatedSupplierId($supplierId)
    {
        if($supplierId){
            $this->showCategories = true;
            $this->category_id = null;
            $this->showSubCategories = false;
            $this->sub_category_id = null;
        }else{
            $this->showCategories = false;
            $this->category_id = null;
            $this->showSubCategories = false;
            $this->sub_category_id = null;
        }
    }
    public function updatedCategoryId($categoryId)
    {
        if($categoryId){
            $this->showSubCategories = true;
            $this->sub_category_id = null;
        }else{
            $this->showSubCategories = false;
            $this->sub_category_id = null;
        }
    }
    public function render()
    {
        $subCategories = SubCategory::where('category_id',$this->category_id)->get();
        $categories = Category::where('supplier_id',$this->supplier_id)->get();
        $suppliers = Supplier::all();
        return view('livewire.products.product-update', compact('subCategories','categories','suppliers'));
    }
}
