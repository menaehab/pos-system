<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.sales') }}</h1>

    <x-success-alert />

    <x-table :data="$sales" :columns="['invoice_number', 'sale_date', 'total_price', 'customer']">
        @foreach ($sales as $key => $sale)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $sale->id }}>
                <x-table-cell :value="$key + $sales->firstItem()" />
                <x-table-cell :value="$sale->invoice_number ?? __('keywords.not_available')" />
                <x-table-cell :value="Carbon\Carbon::parse($sale->sale_date)->format('Y-m-d h:i:s A') ??
                    __('keywords.not_available')" />
                <x-table-cell :value="$sale->total_price ?? __('keywords.not_available')" />
                <x-table-cell :value="$sale->customer->name ?? __('keywords.not_available')" />
                <td class="text-center p-3 px-5 flex justify-center gap-2">
                    <a href="{{ route('invoice.print', $sale->id) }}"
                        class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-print"></i>
                    </a>
                    <a href="{{ route('sales.show', $sale->invoice_number) }}" wire:navigate
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>

                    <a wire:click="$dispatch('deleteModal', { id: '{{ $sale->id }}' })"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
    </x-table>

    <livewire:sales.sale-delete />

</div>
