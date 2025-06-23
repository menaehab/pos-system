<div class="container mx-auto px-4 py-6">
    <!-- Customer Header -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-2xl font-bold text-gray-800">{{ $customer->name }}</h1>
                <p class="text-gray-600 mt-1">
                    <i class="fas fa-phone-alt ml-2"></i>{{ $customer->phone }}
                </p>
            </div>
            <div wire:ignore class="flex flex-wrap gap-4">
                <div class="bg-blue-50 px-4 py-3 rounded-lg text-center">
                    <p class="text-sm text-gray-500">{{ __('keywords.total_paid') }}</p>
                    <p class="text-lg font-semibold text-blue-600">{{ number_format($totalPaid, 2) }}
                        {{ __('keywords.EGP') }}</p>
                </div>
                <div class="bg-{{ $totalPrice < 0 ? 'red' : 'blue' }}-50 px-4 py-3 rounded-lg text-center">
                    <p class="text-sm text-gray-500">{{ __('keywords.total_amount') }}</p>
                    <p class="text-lg font-semibold text-{{ $totalPrice < 0 ? 'red' : 'blue' }}-600">
                        {{ number_format($totalPrice, 2) }} {{ __('keywords.EGP') }}
                    </p>
                </div>
                <div
                    class="bg-{{ $totalPrice - $totalPaid < 0 ? 'red' : 'blue' }}-50 px-4 py-3 rounded-lg text-center">
                    <p class="text-sm text-gray-500">{{ __('keywords.remaining') }}</p>
                    <p class="text-lg font-semibold text-{{ $totalPrice - $totalPaid < 0 ? 'red' : 'blue' }}-600">
                        {{ number_format($totalPrice - $totalPaid, 2) }} {{ __('keywords.EGP') }}
                    </p>
                </div>
                <div class="bg-blue-50 px-4 py-3 rounded-lg text-center">
                    <p class="text-sm text-gray-500">{{ __('keywords.total_orders') }}</p>
                    <p class="text-lg font-semibold text-blue-600">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="-mb-px flex space-x-8">
            <button wire:click="setActiveTab('sales')" @class([
                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                'border-blue-500 text-blue-600' => $activeTab === 'sales',
                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' =>
                    $activeTab !== 'sales',
            ])>
                {{ __('keywords.sales_history') }}
            </button>
            <button wire:click="setActiveTab('ledger')" @class([
                'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                'border-blue-500 text-blue-600' => $activeTab === 'ledger',
                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' =>
                    $activeTab !== 'ledger',
            ])>
                {{ __('keywords.ledger_entries') }}
            </button>
        </nav>
    </div>

    <!-- Search and Filter -->
    <div class="mb-6">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" wire:model.live.debounce.300ms="search"
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                placeholder="{{ $activeTab === 'sales' ? __('keywords.sales') : __('keywords.ledger_entries') }}...">
        </div>
    </div>

    <!-- Content Area -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        @if ($activeTab === 'sales')
            @if ($sales->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.invoice_number') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.date') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.total_amount') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.processed_by') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($sales as $sale)
                                <tr class="hover:bg-gray-50">
                                    <td
                                        class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-blue-600">
                                        {{ $sale->invoice_number }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        {{ $sale->created_at->format('M d, Y h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($sale->total_price, 2) }} {{ __('keywords.EGP') }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        {{ $sale->user->name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6">
                    {{ $sales->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-receipt text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500">{{ __('keywords.no_sales_records_found') }}</p>
                </div>
            @endif
        @else
            @if ($ledgers->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.date') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.description') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.invoice_number') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('keywords.amount') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($ledgers as $entry)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                        {{ $entry->created_at->format('M d, Y h:i A') }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-900">
                                        {{ $entry->note ?? 'No description' }}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-blue-600">
                                        @if ($entry->sale)
                                            {{ $entry->sale->invoice_number }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-center font-medium {{ $entry->amount < 0 ? 'text-red-600' : 'text-green-600' }}">
                                        {{ $entry->amount < 0 ? '-' : '' }}{{ number_format(abs($entry->amount), 2) }}
                                        {{ __('keywords.EGP') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 bg-gray-50 sm:px-6">
                    {{ $ledgers->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-wallet text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500">{{ __('keywords.no_ledger_entries_found') }}</p>
                </div>
            @endif
        @endif
    </div>
</div>

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush
