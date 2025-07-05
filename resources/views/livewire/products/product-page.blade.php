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
                <td class="text-center p-3 px-5 flex justify-center gap-2">
                    <a href="{{ route('products.label', $product->slug) }}"
                        class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-print"></i>
                    </a>
                    <a wire:click="$dispatch('showModal', { slug: '{{ $product->slug }}' })"
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a wire:click="$dispatch('editModal', { slug: '{{ $product->slug }}' })"
                        class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-pen"></i>
                    </a>

                    <a wire:click="$dispatch('deleteModal', { slug: '{{ $product->slug }}' })"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
    </x-table>

    <livewire:products.product-show lazy />

    <livewire:products.product-update />

    <livewire:products.product-delete />

</div>
