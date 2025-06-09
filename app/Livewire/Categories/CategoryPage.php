<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class CategoryPage extends Component
{
    use WithPagination;

    public $search = '';
    public $name = '';
    public $slug = '';

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

        $this->reset(['name']);

        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.category_added_successfully'));
    }

    #[On('editModal')]
    public function openEditModal($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $this->slug = $category->slug;
        $this->name = $category->name;

        $this->dispatch('edit-modal');
    }

    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }

    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $this->slug = $category->slug;

        $this->dispatch('delete-modal');
    }

    public function editCategory()
    {
        $this->validate();

        $category = Category::where('slug', $this->slug)->firstOrFail();
        $category->update([
            'name' => $this->name,
        ]);

        $this->reset(['name', 'slug']);
        $this->resetValidation();

        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.category_edited_successfully'));
    }

    public function deleteCategory()
    {
        Category::where('slug', $this->slug)->firstOrFail()->delete();
        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.category_deleted_successfully'));
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