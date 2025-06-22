<?php

namespace App\Livewire\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\Attributes\On;

class SaleDelete extends Component
{
    public $id = null;

    #[On('deleteModal')]
    public function openDeleteModal($id)
    {
        $this->id = $id;
        $this->dispatch('delete-modal');
    }

    public function deleteSale()
    {
        Sale::where('id', $this->id)->firstOrFail()->delete();

        $this->reset('id');
        $this->dispatch('close-modal');
        $this->dispatch('saleRefresh');

        return session()->flash('success', __('keywords.sale_deleted_successfully'));
    }


    public function render()
    {
        return view('livewire.sales.sale-delete');
    }
}
