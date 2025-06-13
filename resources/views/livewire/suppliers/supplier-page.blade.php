<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.suppliers') }}</h1>

    <livewire:suppliers.supplier-create />

    <x-success-alert />

    <x-table :data="$suppliers" :columns="['name', 'phone']">
        @foreach ($suppliers as $key => $supplier)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $supplier->id }}>
                <x-table-cell :value="$key + $suppliers->firstItem()" />
                <x-table-cell :value="$supplier->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$supplier->phone ?? __('keywords.not_available')" />
                <x-table-actions :slug="$supplier->slug" :show="false" />
            </tr>
        @endforeach
    </x-table>

    <livewire:suppliers.supplier-update />

    <livewire:suppliers.supplier-delete />
</div>
