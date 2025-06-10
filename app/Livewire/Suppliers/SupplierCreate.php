<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\Attributes\On;
use App\Http\Requests\SupplierRequest;

class SupplierCreate extends Component
{
    public $name = null;
    public $phone = null;
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
    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }
    #[On('clear')]
    public function clear()
    {
        $this->reset(['name', 'phone']);
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function addSupplier()
    {
        $this->validate();

        Supplier::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->reset(['name', 'phone']);

        $this->dispatch('close-modal');
        $this->dispatch('supplierRefresh');
        session()->flash('success', __('keywords.supplier_added_successfully'));
    }
    public function render()
    {
        return view('livewire.suppliers.supplier-create');
    }
}
