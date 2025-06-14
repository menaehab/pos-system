<?php

namespace App\Livewire\Purchases;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Purchase;

class PurchaseDelete extends Component
{
    public $id = null;

    #[On('deleteModal')]
    public function openDeleteModal($id)
    {
        $this->id = $id;
        $this->dispatch('delete-modal');
    }

    public function deletePurchase()
    {
        Purchase::where('id', $this->id)->firstOrFail()->delete();

        $this->reset('id');
        $this->dispatch('close-modal');
        $this->dispatch('purchaseRefresh');

        return session()->flash('success', __('keywords.purchase_deleted_successfully'));
    }


    public function render()
    {
        return view('livewire.purchases.purchase-delete');
    }
}
