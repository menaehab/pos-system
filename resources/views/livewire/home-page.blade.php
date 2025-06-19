<div class="flex">
    <div class="w-3/4 h-[calc(100vh-3.3rem)] p-6 bg-white border-r">
        <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.search_products') }}</h1>
        <div class="mb-6">
            <input type="text" placeholder="{{ __('keywords.search_placeholder') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="cursor-pointer p-4 rounded-lg hover:shadow border-2 active:scale-95 transition">
                <h2 class="font-medium text-gray-800 text-sm truncate">{{ __('keywords.product_name') }}</h2>
                <p class="font-semibold">{{ __('keywords.product_price') }} <span class="text-gray-500 text-sm">100
                        ج</span></p>
            </div>


        </div>
    </div>

    <div class="w-1/4 h-[calc(100vh-9rem)] p-6 ">
        <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.order') }}</h1>
        <div class="space-y-4 overflow-y-auto h-5/6">
            <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                <div>
                    <h2 class="font-medium text-gray-800">{{ __('keywords.product_name') }}</h2>
                    <p class="text-gray-500 text-sm">{{ __('keywords.quantity') }} <span
                            class="text-gray-500 text-sm">100</span></p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="font-semibold">100 ج</span>
                    <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"><i
                            class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        </div>

        <div class="mt-6 border-t pt-4">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-medium">{{ __('keywords.total') }}</span>
                <span class="text-xl font-semibold">100 ج</span>
            </div>
            <div class="flex justify-between space-x-4">
                <button class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
                    {{ __('keywords.checkout') }}
                </button>
                <button class="py-2 bg-green-500 px-3 text-sm text-white rounded-lg hover:bg-green-600 transition">
                    {{ __('keywords.checkout_and_print') }}
                </button>
                <button class="py-2 bg-red-500 px-3 text-sm text-white rounded-lg hover:bg-red-600 transition">
                    {{ __('keywords.cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
