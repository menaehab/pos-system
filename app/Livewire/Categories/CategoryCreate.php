<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Http\Requests\CategoryRequest;

class CategoryCreate extends Component
{
    public $name = null;
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
    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }
    #[On('clear')]
    public function clear()
    {
        $this->reset(['name']);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function addCategory()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        $this->reset(['name']);

        $this->dispatch('close-modal');
        $this->dispatch('categoryRefresh');
        session()->flash('success', __('keywords.category_added_successfully'));
    }
    public function render()
    {
        return view('livewire.categories.category-create');
    }
}
