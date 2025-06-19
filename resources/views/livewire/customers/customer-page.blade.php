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
                <x-table-actions :slug="$customer->slug" :show="false" />
            </tr>
        @endforeach
    </x-table>

    <livewire:customers.customer-update />

    <livewire:customers.customer-delete />
</div>
