<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.customers') }}</h1>

    <livewire:customers.customer-create />

    <x-success-alert />

    <x-table :data="$customers" :columns="['name', 'phone']">
        @foreach ($customers as $key => $customer)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $customer->id }}>
                <x-table-cell :value="$key + $customers->firstItem()" />
                <x-table-cell :value="$customer->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$customer->phone ?? __('keywords.not_available')" />
                <td class="text-center p-3 px-5 flex justify-center gap-2">
                    <a href="{{ route('customers.show', $customer->slug) }}" wire:navigate
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a wire:click="$dispatch('editModal', { slug: '{{ $customer->slug }}' })"
                        class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <a wire:click="$dispatch('deleteModal', { slug: '{{ $customer->slug }}' })"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-table>

    <livewire:customers.customer-update />

    <livewire:customers.customer-delete />
</div>
