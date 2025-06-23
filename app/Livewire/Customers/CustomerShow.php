<?php

namespace App\Livewire\Customers;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class CustomerShow extends Component
{
    use WithPagination;

    public $customer;
    public $search = '';
    public $perPage = 10;
    public $activeTab = 'sales';

    public function mount($slug)
    {
        $this->customer = Customer::withCount('sales')
            ->withSum('sales', 'total_price')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        $sales = $this->customer->sales()
            ->when($this->search, function ($query) {
                $query->where('invoice_number', 'like', "%{$this->search}%");
            })
            ->with('user')
            ->latest()
            ->paginate($this->perPage, ['*'], 'salesPage');

        $ledgers = $this->customer->ledgers()
            ->when($this->search, function ($query) {
                $query->where('note', 'like', "%{$this->search}%")
                    ->orWhereHas('sale', function ($q) {
                        $q->where('invoice_number', 'like', "%{$this->search}%");
                    });
            })
            ->with('sale')
            ->latest()
            ->paginate($this->perPage, ['*'], 'ledgersPage');

        $totalPaid =$ledgers->sum('amount');
        $totalPrice = $this->customer->sales()->sum('total_price');
        $totalOrders = $this->customer->sales_count ?? 0;

        return view('livewire.customers.customer-show', [
            'sales' => $sales,
            'ledgers' => $ledgers,
            'totalPaid' => $totalPaid,
            'totalOrders' => $totalOrders,
            'totalPrice' => $totalPrice,
        ])->layout('pages.layout', [
            'title' => __('keywords.customer_details')
        ]);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }
}
