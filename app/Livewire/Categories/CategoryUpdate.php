<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Http\Requests\CategoryRequest;

class CategoryUpdate extends Component
{
    public $name = '';
    public $slug = '';
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

        $this->dispatch('edit-modal');
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
        $this->dispatch('refresh');
    }
    public function render()
    {
        return view('livewire.categories.category-update');
    }
}
