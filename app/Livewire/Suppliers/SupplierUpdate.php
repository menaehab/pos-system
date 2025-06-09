<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\Attributes\On;
use App\Http\Requests\SupplierRequest;

class SupplierUpdate extends Component
{
    public $name = null;
    public $phone = null;
    public $slug = null;
    protected function rules()
    {
        return (new SupplierRequest())->rules();
    }

    protected function messages()
    {
        return (new SupplierRequest())->messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    #[On('editModal')]
    public function openEditModal($slug)
    {
        $supplier = Supplier::where('slug', $slug)->firstOrFail();

        $this->slug = $supplier->slug;
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;

        $this->dispatch('edit-modal');
    }

    public function updateSupplier()
    {
        $this->validate();

        $supplier = Supplier::where('slug', $this->slug)->firstOrFail();
        $supplier->update([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->reset(['name', 'slug']);
        $this->resetValidation();

        $this->dispatch('close-modal');
        session()->flash('success', __('keywords.supplier_edited_successfully'));
        $this->dispatch('refresh');
    }
    public function render()
    {
        return view('livewire.suppliers.supplier-update');
    }
}