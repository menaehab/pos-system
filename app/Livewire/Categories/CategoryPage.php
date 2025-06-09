<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Http\Requests\CategoryRequest;

class CategoryPage extends Component
{
    use WithPagination;

    protected $listeners = ['refresh' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::where('name', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);

        return view('livewire.categories.category-page', compact('categories'))
            ->layout('pages.layout', [
                'title' => __('keywords.categories')
            ]);
    }
}
