<div class="flex flex-col min-h-screen" style="min-height: calc(100vh - 53px);">
    <!-- Main Content -->
    <div class="flex flex-col md:flex-row flex-1">
        <!-- Left Section -->
        <div class="w-full flex flex-col bg-gray-100 border-b md:border-b-0 md:border-r overflow-hidden"
            style="margin-left: 320px;">
            <div class="p-4 md:p-6 overflow-y-auto flex-1">
                <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.search_products') }}</h1>
                <div class="mb-6">
                    <input type="text" wire:model.live.debounce.200ms="search"
                        placeholder="{{ __('keywords.search_placeholder') }}"
                        class="w-full bg-white px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="flex justify-center">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-3 w-full max-w-7xl">
                        @if ($allProducts->count() > 0)
                            @foreach ($allProducts as $product)
                                <button wire:click="addToCart({{ $product->id }})"
                                    class="cursor-pointer bg-white p-4 rounded-lg hover:shadow border-2 active:scale-95 transition">
                                    <h2 class="font-medium text-gray-800 text-sm truncate">{{ $product->name }}</h2>
                                    <p class="font-semibold">{{ __('keywords.product_price') }} <span
                                            class="text-gray-500 text-sm">{{ $product->sell_price }}
                                            ج</span></p>
                                    <p class="text-gray-500 text-sm mt-1"><span
                                            class="font-bold">{{ __('keywords.barcode') }}</span>
                                        {{ $product->barcode }}
                                    </p>
                                </button>
                            @endforeach
                        @else
                            <div class="col-span-full">
                                <p class="text-center">{{ __('keywords.no_products_found') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="p-4 border-t bg-gray-100">
                {{ $allProducts->links() }}
            </div>
        </div>

        <!-- Right Section -->
        <div class="fixed top-0 left-0 h-screen p-4 md:p-6 flex flex-col bg-white border-r z-50" style="width: 320px;">
            <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.order') }}</h1>
            <div class="space-y-4 pr-2 mt-4 overflow-y-auto" style="height: calc(100vh - 250px);">
                @if (count($cart) > 0)
                    @foreach ($cart as $item)
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                            <div class="flex-1">
                                <h2 class="font-medium text-gray-800">{{ $item['name'] }}</h2>
                                <div class="flex items-center mt-1">
                                    <span class="text-gray-500 text-sm mr-2">{{ __('keywords.quantity') }}:</span>
                                    <input type="number" wire:model.live.debounce.300ms="quantity.{{ $item['id'] }}"
                                        wire:change="updateQuantity({{ $item['id'] }}, $event.target.value)"
                                        min="1" class="w-12 px-1 py-0.5 text-sm border rounded text-center"
                                        value="{{ $item['quantity'] }}">
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span
                                    class="font-semibold whitespace-nowrap">{{ number_format($item['price'] * $item['quantity'], 2) }}
                                    ج</span>
                                <button wire:click="removeFromCart({{ $item['id'] }})"
                                    class="p-2 text-red-500 hover:text-red-700" title="{{ __('keywords.remove') }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">{{ __('keywords.no_items_in_cart') }}</p>
                @endif
            </div>
            <div class="mt-4 border-t pt-4">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-lg font-medium">{{ __('keywords.total') }}</span>
                    <span class="text-xl font-semibold">{{ $total }} ج</span>
                </div>
                <div class="mb-4">
                    <select wire:model.live="customer_id"
                        class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        wire:change="$refresh">
                        <option value="">{{ __('keywords.select_customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    @if ($showLedger)
                        <input
                            class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            type="integer" wire:model.live.lazy='amount' placeholder="{{ __('keywords.amount') }}">
                        <textarea class="w-full px-4 mb-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            wire:model.live.lazy='note' placeholder="{{ __('keywords.note') }}"></textarea>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-2 sm:space-y-0">
                    <button wire:click="checkout()"
                        class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
                        {{ __('keywords.checkout') }}
                    </button>
                    <button wire:click="checkout(true)"
                        class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
                        {{ __('keywords.checkout_and_print') }}
                    </button>
                    <button wire:click="clearCart()"
                        class="py-2 bg-red-500 px-3 text-sm text-white rounded-lg hover:bg-red-600 transition">
                        {{ __('keywords.cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let barcode = '';
    let typingTimer;

    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey || e.altKey || e.metaKey) return;

        clearTimeout(typingTimer);

        if (e.key === 'Enter') {
            if (barcode.length > 3) {
                window.Livewire.first().call('handleBarcodeScan', barcode);
            }
            barcode = '';
            return;
        }

        if (/^[a-zA-Z0-9]$/.test(e.key)) {
            barcode += e.key;
            typingTimer = setTimeout(() => barcode = '', 300);
        }
    });
</script>
