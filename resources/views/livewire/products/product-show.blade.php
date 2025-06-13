    <x-show-modal title="{{ __('keywords.show_product') }}" action="showProduct">
        <x-read-only-input name="name" label="{{ __('keywords.name') }}"
            value="{{ $product->name ?? __('keywords.not_available') }}" />
        <x-read-only-input name="supplier" label="{{ __('keywords.supplier') }}"
            value="{{ $product->subCategory?->category?->supplier?->name ?? __('keywords.not_available') }}" />
        <x-read-only-input name="category" label="{{ __('keywords.category') }}"
            value="{{ $product->subCategory?->category?->name ?? __('keywords.not_available') }}" />
        <x-read-only-input name="subCategory" label="{{ __('keywords.sub_category') }}"
            value="{{ $product->subCategory?->name ?? __('keywords.not_available') }}" />
        <x-read-only-input name="barcode" label="{{ __('keywords.barcode') }}"
            value="{{ $product->barcode ?? __('keywords.not_available') }}" />
        <x-read-only-input name="buy_price" label="{{ __('keywords.buy_price') }}"
            value="{{ $product->buy_price ?? __('keywords.not_available') }}" />
        <x-read-only-input name="sell_price" label="{{ __('keywords.sell_price') }}"
            value="{{ $product->sell_price ?? __('keywords.not_available') }}" />
        <x-read-only-input name="quantity" label="{{ __('keywords.quantity') }}"
            value="{{ $product->quantity ?? __('keywords.not_available') }}" />
        <x-read-only-input name="pieces_per_carton" label="{{ __('keywords.pieces_per_carton') }}"
            value="{{ $product->pieces_per_carton ?? __('keywords.not_available') }}" />
    </x-show-modal>
