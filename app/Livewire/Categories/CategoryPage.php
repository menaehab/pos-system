<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class CategoryPage extends Component
{
    use WithPagination;
    public $search;
    public $name;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function addCategory()
    {
        $this->validate();
        Category::create([
            'name' => $this->name,
        ]);
        $this->reset();
        session()->flash('success', __('keywords.category_added_successfully'));
    }
    public function render()
    {
        $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.categories.category-page', compact('categories'))->layout('pages.layout', [
            'title' => __('keywords.categories')
        ]);
    }
}
