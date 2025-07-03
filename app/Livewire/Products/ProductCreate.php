<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use Milon\Barcode\DNS1D;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Http\Requests\ProductRequest;

class ProductCreate extends Component
{
    public $name;
    public $sub_category_id;
    public $barcode;
    public $buy_price;
    public $sell_price;
    public $quantity;
    public $pieces_per_carton;
    public $category_id;
    public $supplier_id;
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
    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }
    #[On('clear')]
    public function clear()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function addProduct()
    {
        $this->validate();

        if(!$this->barcode){
            $this->barcode = rand(100000000000,999999999999);
        }

        Product::create([
            'name' => $this->name,
            'sub_category_id' => $this->sub_category_id,
            'barcode' => $this->barcode,
            'buy_price' => $this->buy_price,
            'sell_price' => $this->sell_price,
            'quantity' => $this->quantity,
            'pieces_per_carton' => $this->pieces_per_carton,
        ]);

        $this->reset();

        $this->dispatch('close-modal');
        $this->dispatch('productRefresh');
        session()->flash('success', __('keywords.product_added_successfully'));
    }
    public function updatedSupplierId($supplierId)
    {
        if($supplierId){
            $this->showCategories = true;
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
        }else{
            $this->showSubCategories = false;
            $this->sub_category_id = null;
        }
    }

    public function render()
    {
        $suppliers = Supplier::all();
        $categories = Category::where('supplier_id',$this->supplier_id)->get();
        $subCategories = SubCategory::where('category_id',$this->category_id)->get();
        return view('livewire.products.product-create', compact('subCategories','categories','suppliers'));
    }
}