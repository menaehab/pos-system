<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Supplier;

class SupplierDelete extends Component
{
    public $slug = null;
    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $supplier = Supplier::where('slug', $slug)->firstOrFail();

        $this->slug = $supplier->slug;
    }
    public function deleteSupplier()
    {
        Supplier::where('slug', $this->slug)->firstOrFail()->delete();

        $this->reset('slug');
        $this->dispatch('close-modal');
        $this->dispatch('supplierRefresh');
        session()->flash('success', __('keywords.supplier_deleted_successfully'));
    }
    public function render()
    {
        return view('livewire.suppliers.supplier-delete');
    }
}
