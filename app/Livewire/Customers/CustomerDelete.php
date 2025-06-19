<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;

class CustomerDelete extends Component
{
    public $slug = null;

    #[On('deleteModal')]
    public function openDeleteModal($slug)
    {
        $this->slug = $slug;
        $this->dispatch('delete-modal');
    }
    public function deleteCustomer()
    {
        Customer::where('slug', $this->slug)->firstOrFail()->delete();

        $this->reset('slug');
        $this->dispatch('close-modal');
        $this->dispatch('customerRefresh');

        session()->flash('success', __('keywords.customer_deleted_successfully'));
    }
    public function render()
    {
        return view('livewire.customers.customer-delete');
    }
}
