<?php

namespace App\Livewire\SubCategories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SubCategory;

class SubCategoryPage extends Component
{
    use WithPagination;

    protected $listeners = ['subCategoryRefresh' => '$refresh'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subCategories = SubCategory::where('name', 'like', "%{$this->search}%")
            ->whereHas('category', function ($query) {
                $query->where('name', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);
        return view('livewire.sub-categories.sub-category-page', compact('subCategories'))->layout('pages.layout', [
            'title' => __('keywords.sub_categories')
        ]);
    }
}