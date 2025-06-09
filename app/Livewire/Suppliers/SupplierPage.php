<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Http\Requests\SupplierRequest;

class SupplierPage extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['refresh' => '$refresh'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $suppliers = Supplier::where('name', 'like', "%{$this->search}%")
            ->orWhere('phone', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);

        return view('livewire.suppliers.supplier-page', compact('suppliers'))
            ->layout('pages.layout', [
                'title' => __('keywords.suppliers')
            ]);
    }
}