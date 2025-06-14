<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_product') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_product') }}" action="addProduct">
        <x-barcode-wrapper>
            <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
            <x-select name="supplier_id" placeholder="{{ __('keywords.supplier') }}" :options="$suppliers" />
            @if ($showCategories)
                <x-select name="category_id" placeholder="{{ __('keywords.category') }}" :options="$categories" />
            @endif
            @if ($showSubCategories)
                <x-select name="sub_category_id" placeholder="{{ __('keywords.sub_category') }}" :options="$subCategories" />
            @endif
            <x-barcode-input name="barcode" placeholder="{{ __('keywords.barcode') }}" />
            <x-input type="number" name="buy_price" placeholder="{{ __('keywords.buy_price') }}" />
            <x-input type="number" name="sell_price" placeholder="{{ __('keywords.sell_price') }}" />
            <x-input type="number" name="quantity" placeholder="{{ __('keywords.quantity') }}" />
            <x-input type="number" name="pieces_per_carton" placeholder="{{ __('keywords.pieces_per_carton') }}" />
        </x-barcode-wrapper>
    </x-add-modal>

</div>
