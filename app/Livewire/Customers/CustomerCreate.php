<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Http\Requests\CustomerRequest;

class CustomerCreate extends Component
{
    public $name = null;
    public $phone = null;
    protected function rules()
    {
        return (new CustomerRequest())->rules();
    }

    protected function messages()
    {
        return (new CustomerRequest())->messages();
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
    #[On('addCustomer')]
    public function addCustomer()
    {
        $this->validate();

        Customer::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->reset(['name', 'phone']);

        $this->dispatch('close-modal');
        $this->dispatch('customerRefresh');
        session()->flash('success', __('keywords.customer_added_successfully'));
    }
    public function render()
    {
        return view('livewire.customers.customer-create');
    }
}