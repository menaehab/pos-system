<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;

class CategoryDelete extends Component
{
    public $slug = '';
    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $this->slug = $category->slug;

        $this->dispatch('delete-modal');
    }

    public function deleteCategory()
    {
        Category::where('slug', $this->slug)->firstOrFail()->delete();
        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.category_deleted_successfully'));
        $this->dispatch('refresh');
    }
    public function render()
    {
        return view('livewire.categories.category-delete');
    }
}
