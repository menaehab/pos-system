<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\Attributes\On;
use App\Http\Requests\CustomerRequest;

class CustomerUpdate extends Component
{
    public $name = null;
    public $phone = null;
    public $slug = null;
    public function rules()
    {
        return (new CustomerRequest())->rules();
    }
    public function messages()
    {
        return (new CustomerRequest())->messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    #[On('editModal')]
    public function openEditModal($slug)
    {
        $customer = Customer::where('slug', $slug)->firstOrFail();

        $this->slug = $customer->slug;
        $this->name = $customer->name;
        $this->phone = $customer->phone;

        $this->dispatch('edit-modal');
    }
    public function editCustomer()
    {
        $this->validate();

        $customer = Customer::where('slug', $this->slug)->firstOrFail();
        $customer->update([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->reset();
        $this->resetValidation();

        $this->dispatch('close-modal');
        $this->dispatch('customerRefresh');

        session()->flash('success', __('keywords.customer_edited_successfully'));
    }
    public function render()
    {
        return view('livewire.customers.customer-update');
    }
}
