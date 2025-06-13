<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.products') }}</h1>
    <livewire:products.product-create />

    <x-success-alert />

    <x-table :data="$products" :columns="['name', 'subCategory', 'barcode']">
        @foreach ($products as $key => $product)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $product->id }}>
                <x-table-cell :value="$key + $products->firstItem()" />
                <x-table-cell :value="$product->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$product->subCategory->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$product->barcode ?? __('keywords.not_available')" />
                <x-table-actions :slug="$product->slug" :show="true" />
            </tr>
        @endforeach
    </x-table>

    <livewire:products.product-show lazy />

    <livewire:products.product-update />

    <livewire:products.product-delete />

</div>
