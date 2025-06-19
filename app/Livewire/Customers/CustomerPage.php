<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;

class CustomerPage extends Component
{
    public $search = '';

    protected $listeners = ['customerRefresh' => '$refresh'];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $customers = Customer::where('name', 'like', "%{$this->search}%")
        ->orWhere('phone','like',"%{$this->search}%")
        ->latest()
        ->paginate(10);
        return view('livewire.customers.customer-page', compact('customers'))
        ->layout('pages.layout', [
            'title' => __('keywords.customers')
        ]);
    }
}
