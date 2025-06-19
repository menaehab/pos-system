<div class="flex flex-col min-h-screen" style="min-height: calc(100vh - 53px);">
    <!-- Main Content -->
    <div class="flex flex-col md:flex-row flex-1">
        <!-- Left Section -->
        <div class="w-full md:w-3/4 p-4 md:p-6 bg-white border-b md:border-b-0 md:border-r overflow-y-auto">
            <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.search_products') }}</h1>
            <div class="mb-6">
                <input type="text" placeholder="{{ __('keywords.search_placeholder') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="cursor-pointer p-4 rounded-lg hover:shadow border-2 active:scale-95 transition">
                    <h2 class="font-medium text-gray-800 text-sm truncate">{{ __('keywords.product_name') }}</h2>
                    <p class="font-semibold">{{ __('keywords.product_price') }} <span class="text-gray-500 text-sm">100
                            ج</span></p>
                </div>
                <!-- Products continue... -->
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-1/4 p-4 md:p-6 flex flex-col">
            <h1 class="text-2xl font-semibold mb-4 text-center">{{ __('keywords.order') }}</h1>
            <div class="space-y-4 overflow-y-auto flex-1">
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
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-2 sm:space-y-0">
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
</div>
