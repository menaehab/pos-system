<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Models\Supplier;
use Livewire\Attributes\On;
use App\Http\Requests\CategoryRequest;

class CategoryUpdate extends Component
{
    public $name = null;
    public $slug = null;
    public $supplier_id = null;
    protected function rules()
    {
        return (new CategoryRequest())->rules();
    }

    protected function messages()
    {
        return (new CategoryRequest())->messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    #[On('editModal')]
    public function openEditModal($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $this->slug = $category->slug;
        $this->name = $category->name;
        $this->supplier_id = $category->supplier_id;

        $this->dispatch('edit-modal');
    }

    public function editCategory()
    {
        $this->validate();

        $category = Category::where('slug', $this->slug)->firstOrFail();
        $category->update([
            'name' => $this->name,
            'supplier_id' => $this->supplier_id,
        ]);

        $this->reset();
        $this->resetValidation();

        $this->dispatch('close-modal');
        $this->dispatch('categoryRefresh');
        session()->flash('success', __('keywords.category_edited_successfully'));
    }
    public function render()
    {
        $suppliers = Supplier::lazy();
        return view('livewire.categories.category-update', compact('suppliers'));
    }
}