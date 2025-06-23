<div class="p-4 my-10">
    <h2 class="text-5xl text-center font-bold mb-10">{{ __('keywords.add_installment_payment') }}</h2>
    <form wire:submit.prevent="submit" class="bg-white rounded-lg shadow-lg w-full p-6 container mx-auto">

        <div class="space-y-4">
            <!-- Customer Selection -->
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('keywords.customer') }}
                </label>
                <select id="customer_id" wire:model.live.lazy="customer_id"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">{{ __('keywords.select_customer') }}</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('customer_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Invoice Number -->
            <div>
                <label for="invoice_number" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('keywords.invoice_number') }}
                </label>
                <input type="text" id="invoice_number" wire:model.live.lazy="invoice_number"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('invoice_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amount -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('keywords.amount') }}
                </label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">ج.م</span>
                    </div>
                    <input type="number" id="amount" wire:model.live.lazy="amount"
                        class="block w-full pl-7 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                @error('amount')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Notes -->
            <div>
                <label for="note" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('keywords.notes') }}
                </label>
                <textarea id="note" wire:model.live.lazy="note" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                @error('note')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-2 mt-6">
            <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors cursor-pointer">
                {{ __('keywords.save') }}
            </button>
        </div>
    </form>
</div>
