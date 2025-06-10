<?php

namespace App\Livewire\SubCategories;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryCreate extends Component
{
    public $name;
    public $category_id;
    protected function rules()
    {
        return (new SubCategoryRequest())->rules();
    }

    protected function messages()
    {
        return (new SubCategoryRequest())->messages();
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
        $this->reset(['name']);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function addSubCategory()
    {
        $this->validate();

        SubCategory::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);

        $this->reset(['name']);

        $this->dispatch('close-modal');
        $this->dispatch('subCategoryRefresh');
        session()->flash('success', __('keywords.sub_category_added_successfully'));
    }

    public function render()
    {
        $categories = Category::lazy();
        return view('livewire.sub-categories.sub-category-create', compact('categories'));
    }
}
