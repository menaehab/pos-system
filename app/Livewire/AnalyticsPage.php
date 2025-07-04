<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use App\Models\Purchase;
use Livewire\Attributes\On;
use App\Models\CustomerLedger;
use Illuminate\Support\Facades\DB;

class AnalyticsPage extends Component
{
    public $selectedMonth;
    public $salesTotal;
    public $purchasesTotal;
    public $paymentsTotal;

    public function mount()
    {
        $this->selectedMonth = now()->format('Y-m');
        $this->calculateTotals();
    }

    public function updatedSelectedMonth($value)
    {
        $this->calculateTotals();
        $this->loadChartData();
    }

    public function calculateTotals()
    {
        $this->salesTotal = Sale::whereYear('created_at', '=', date('Y', strtotime($this->selectedMonth)))
            ->whereMonth('created_at', '=', date('m', strtotime($this->selectedMonth)))
            ->sum('total_price');

        $this->purchasesTotal = Purchase::whereYear('purchase_date', '=', date('Y', strtotime($this->selectedMonth)))
            ->whereMonth('purchase_date', '=', date('m', strtotime($this->selectedMonth)))
            ->sum('total_amount');

        $this->paymentsTotal = CustomerLedger::whereYear('created_at', '=', date('Y', strtotime($this->selectedMonth)))
            ->whereMonth('created_at', '=', date('m', strtotime($this->selectedMonth)))
            ->sum('amount');
    }

    #[On('loadChartData')]
    public function loadChartData()
    {
        $year = date('Y', strtotime($this->selectedMonth));

        $salesData = Sale::whereYear('created_at', $year)
            ->selectRaw('SUM(total_price) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->get()
            ->toArray();

        $purchasesData = Purchase::whereYear('purchase_date', $year)
            ->selectRaw('SUM(total_amount) as total, MONTH(purchase_date) as month')
            ->groupBy('month')
            ->get()
            ->toArray();

        $paymentsData = CustomerLedger::whereYear('created_at', $year)
            ->selectRaw('SUM(amount) as total, MONTH(created_at) as month')
            ->groupBy('month')
            ->get()
            ->toArray();

        $this->dispatch('update-chart', [
            'sales' => $salesData,
            'purchases' => $purchasesData,
            'payments' => $paymentsData,
        ]);
    }

    public function render()
    {
        return view('livewire.analytics-page')->layout('pages.layout', [
            'title' => __('keywords.analytics')
        ]);
    }
}
