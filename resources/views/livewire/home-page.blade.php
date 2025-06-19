<div class="flex flex-col min-h-screen" style="min-height: calc(100vh - 53px);">
    <!-- Main Content -->
    <div class="flex flex-col md:flex-row flex-1">
        <!-- Left Section -->
        <div class="w-full flex flex-col bg-white border-b md:border-b-0 md:border-r overflow-hidden"
            style="margin-left: 320px;">
            <div class="p-4 md:p-6 overflow-y-auto flex-1">
                <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.search_products') }}</h1>
                <div class="mb-6">
                    <input type="text" wire:model.live.debounce.200ms="search"
                        placeholder="{{ __('keywords.search_placeholder') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex justify-center">
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-3 w-full max-w-7xl">
                        @if ($products->count() > 0)
                            @foreach ($products as $product)
                                <button wire:click="addToCart({{ $product->id }})"
                                    class="cursor-pointer p-4 rounded-lg hover:shadow border-2 active:scale-95 transition">
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
            <div class="p-4 border-t bg-white">
                {{ $products->links() }}
            </div>
        </div>

        <!-- Right Section -->
        <div class="fixed top-0 left-0 h-screen p-4 md:p-6 flex flex-col bg-white border-r z-50" style="width: 320px;">
            <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.order') }}</h1>
            <div class="space-y-4 pr-2 mt-4 overflow-y-auto" style="height: calc(100vh - 250px);">
                @if (count($cart) > 0)
                    @foreach ($cart as $item)
                        <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                            <div>
                                <h2 class="font-medium text-gray-800">{{ $item['name'] }}</h2>
                                <p class="text-gray-500 text-sm">{{ __('keywords.quantity') }} <span
                                        class="text-gray-500 text-sm">{{ $item['quantity'] }}</span>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">{{ $item['price'] }} ج</span>
                                <button wire:click="removeFromCart({{ $item['id'] }})"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"><i
                                        class="fa-solid fa-trash"></i></button>
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
                    <select wire:model="customer_id"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">{{ __('keywords.select_customer') }}</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-2 sm:space-y-0">
                    <button wire:click="checkout()"
                        class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
                        {{ __('keywords.checkout') }}
                    </button>
                    <button class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
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
</div>
