<?php

namespace App\Livewire\SubCategories;

use Livewire\Component;
use App\Models\SubCategory;
use Livewire\Attributes\On;

class SubCategoryDelete extends Component
{
    public $slug = null;

    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $this->slug = $slug;
        $this->dispatch('delete-modal');
    }

    public function deleteSubCategory()
    {
        SubCategory::where('slug', $this->slug)->firstOrFail()->delete();

        $this->reset('slug');
        $this->dispatch('close-modal');
        $this->dispatch('subCategoryRefresh');

        return session()->flash('success', __('keywords.sub_category_deleted_successfully'));
    }
    public function render()
    {
        return view('livewire.sub-categories.sub-category-delete');
    }
}
