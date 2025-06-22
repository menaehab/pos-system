<div dir="rtl" class="container mx-auto px-4 py-8 font-tajawal">
    <div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
        <!-- Invoice Header -->
        <div class="flex justify-between items-start mb-8">
            <div class="text-right">
                <h1 class="text-2xl font-bold text-gray-800">{{ __('keywords.invoice') }}</h1>
                <p class="text-gray-600">{{ __('keywords.invoice_number') }}: {{ $sale->invoice_number }}</p>
            </div>
            <div class="text-left">
                <p class="text-gray-600">
                    <span class="font-semibold">{{ __('keywords.sale_date') }}:</span>
                    {{ $sale->created_at ? $sale->created_at->format('Y/m/d H:i:s A') : 'N/A' }}
                </p>
            </div>
        </div>

        <!-- Customer Information -->
        @if ($sale->customer)
            <div class="mb-8 p-4 bg-gray-50 rounded-lg text-right">
                <h2 class="text-lg font-semibold mb-2">{{ __('keywords.customer') }}:</h2>
                <p class="font-medium">{{ $sale->customer->name }}</p>
                @if ($sale->customer->phone)
                    <p class="text-gray-600">{{ __('keywords.phone') }}: {{ $sale->customer->phone }}</p>
                @endif
            </div>
        @endif

        <!-- Products Table -->
        <div class="mb-8 overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('keywords.product') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('keywords.price') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('keywords.quantity') }}</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('keywords.total_price') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($sale->saleItems as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="text-sm font-medium text-gray-900">{{ $item->product->name }}</div>
                                @if ($item->product->code)
                                    <div class="text-sm text-gray-500">{{ $item->product->code }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm text-gray-500">
                                {{ number_format($item->price, 2) }} ج.م
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                {{ $item->quantity }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                {{ number_format($item->price * $item->quantity, 2) }} ج.م
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary -->
        <div class="flex justify-start">
            <div class="w-64">
                <div class="flex justify-between py-2 border-t border-gray-200 mt-2">
                    <span class="font-bold text-lg">{{ __('keywords.final_total') }}:</span>
                    <span class="font-bold text-lg">{{ number_format($sale->total_price, 2) }} ج.م</span>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8 text-center">
            <a href={{ route('invoice.print', $sale->id) }}
                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                {{ __('keywords.print_invoice') }}
            </a>
            <a href="{{ route('sales') }}"
                class="mr-2 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                {{ __('keywords.back') }}
            </a>
        </div>
    </div>
</div>
