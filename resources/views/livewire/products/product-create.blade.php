<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_product') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_product') }}" action="addProduct">
        <div x-data="barcodeScanner">
            <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
            <x-select name="supplier_id" placeholder="{{ __('keywords.supplier') }}" :options="$suppliers" />
            @if ($showCategories)
                <x-select name="category_id" placeholder="{{ __('keywords.category') }}" :options="$categories" />
            @endif
            @if ($showSubCategories)
                <x-select name="sub_category_id" placeholder="{{ __('keywords.sub_category') }}" :options="$subCategories" />
            @endif
            <div>
                <input type="text" wire:model.lazy="barcode" placeholder="{{ __('keywords.barcode') }}"
                    class="w-full p-2 border rounded mb-4 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
                    x-ref="barcodeInput">
                <x-error-message name="barcode" />
            </div>

            <x-input type="number" name="buy_price" placeholder="{{ __('keywords.buy_price') }}" />
            <x-input type="number" name="sell_price" placeholder="{{ __('keywords.sell_price') }}" />
            <x-input type="number" name="quantity" placeholder="{{ __('keywords.quantity') }}" />
            <x-input type="number" name="pieces_per_carton" placeholder="{{ __('keywords.pieces_per_carton') }}" />
        </div>
    </x-add-modal>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('barcodeScanner', () => ({
                buffer: '',
                lastKeyTime: Date.now(),
                timeout: null,

                init() {
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            e.stopPropagation();
                            return;
                        }

                        const currentTime = Date.now();
                        const timeDiff = currentTime - this.lastKeyTime;
                        this.lastKeyTime = currentTime;

                        if (e.key.length === 1) {
                            if (timeDiff < 50) {
                                this.buffer += e.key;
                            } else {
                                this.buffer = e.key;
                            }

                            clearTimeout(this.timeout);
                            this.timeout = setTimeout(() => {
                                if (this.buffer.length >= 6) {
                                    const barcode = this.buffer.trim();
                                    this.$refs.barcodeInput.value = barcode;

                                    const component = Livewire.find(this.$root.closest(
                                        '[wire\\:id]').getAttribute('wire:id'));
                                    component.set('barcode', barcode);

                                    this.buffer = '';
                                }
                            }, 100);
                        }
                    });
                },
            }));
        });
    </script>
</div>
