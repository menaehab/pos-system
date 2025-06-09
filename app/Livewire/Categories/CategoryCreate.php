<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Http\Requests\CategoryRequest;

class CategoryCreate extends Component
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

    public function addCategory()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);

        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.category_added_successfully'));
        $this->dispatch('refresh');
    }
    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }
    #[On('clear')]
    public function clear()
    {
        $this->reset(['name', 'slug']);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.categories.category-create');
    }
}