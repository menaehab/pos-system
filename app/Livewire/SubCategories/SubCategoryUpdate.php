<?php

namespace App\Livewire\SubCategories;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryUpdate extends Component
{
    public $name = null;
    public $slug = null;
    public $category_id = null;
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

    #[On('editModal')]
    public function openEditModal($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->firstOrFail();

        $this->slug = $subCategory->slug;
        $this->name = $subCategory->name;
        $this->category_id = $subCategory->category_id;

        $this->dispatch('edit-modal');
    }

    public function editSubCategory()
    {
        $this->validate();

        $subCategory = SubCategory::where('slug', $this->slug)->firstOrFail();
        $subCategory->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
        ]);

        $this->reset();
        $this->resetValidation();

        $this->dispatch('close-modal');
        $this->dispatch('subCategoryRefresh');
        session()->flash('success', __('keywords.sub_category_edited_successfully'));
    }
    public function render()
    {
        $categories = Category::lazy();
        return view('livewire.sub-categories.sub-category-update', compact('categories'));
    }
}