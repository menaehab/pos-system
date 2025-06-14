<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.purchases') }}</h1>

    <a href="{{ route('purchases.create') }}"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">{{ __('keywords.add_purchase') }}</a>

    <x-success-alert />

    <x-table :data="$purchases" :columns="['supplier', 'purchase_date', 'total_amount']">
        @foreach ($purchases as $key => $purchase)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $purchase->id }}>
                <x-table-cell :value="$key + $purchases->firstItem()" />
                <x-table-cell :value="$purchase->supplier->name ?? __('keywords.not_available')" />
                <x-table-cell :value="Carbon\Carbon::parse($purchase->purchase_date)->format('Y-m-d h:i:s A') ??
                    __('keywords.not_available')" />
                <x-table-cell :value="$purchase->total_amount ?? __('keywords.not_available')" />
                <td class="text-center p-3 px-5 flex justify-center gap-2">
                    <a wire:click="$dispatch('showModal', { slug: '{{ $purchase->slug }}' })"
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('purchases.edit', $purchase->id) }}" wire:navigate
                        class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <a wire:click="$dispatch('deleteModal', { slug: '{{ $purchase->slug }}' })"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
    </x-table>

</div>
