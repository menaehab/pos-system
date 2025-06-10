<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class CategoryDelete extends Component
{
    public $slug = null;

    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $this->slug = $slug;
        $this->dispatch('delete-modal');
    }

    public function deleteCategory()
    {
        Category::where('slug', $this->slug)->firstOrFail()->delete();

        $this->reset('slug');
        $this->dispatch('close-modal');
        $this->dispatch('categoryRefresh');

        return session()->flash('success', __('keywords.category_deleted_successfully'));
    }

    public function render()
    {
        return view('livewire.categories.category-delete');
    }
}