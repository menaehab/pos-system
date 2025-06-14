<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.purchase_create') }}</h1>

    <form wire:submit.prevent="update">
        <x-select name="supplier_id" :options="$suppliers" :placeholder="__('keywords.supplier')" />
        <x-input name="purchase_date" type="datetime-local" :placeholder="__('keywords.purchase_date')" />
        <x-input name="total_amount" type="number" :placeholder="__('keywords.total_amount')" />
        <x-input name="paid_amount" type="number" :placeholder="__('keywords.paid_amount')" />
        <x-input name="due_amount" type="number" :placeholder="__('keywords.due_amount')" />
        <x-textarea name="note" :placeholder="__('keywords.note')" />

        <hr class="my-4">

        <h2 class="text-xl font-semibold mb-2">{{ __('keywords.purchase_items') }}</h2>

        @foreach ($items as $index => $item)
            <div class="flex justify-around gap-2 mb-2 items-end">
                <div>
                    <label>{{ __('keywords.product') }}</label>
                    <select wire:model="items.{{ $index }}.product_id" class="w-full border rounded p-2">
                        <option value="">{{ __('keywords.select_product') }}</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>{{ __('keywords.cartoon_quantity') }}</label>
                    <input type="checkbox" wire:model="items.{{ $index }}.cartoon_quantity"
                        class="w-full border rounded p-2" />
                </div>
                <div>
                    <label>{{ __('keywords.quantity') }}</label>
                    <input type="number" wire:model="items.{{ $index }}.quantity"
                        class="w-full border rounded p-2" />
                </div>

                <div>
                    <label>{{ __('keywords.price') }}</label>
                    <input type="number" wire:model="items.{{ $index }}.price"
                        class="w-full border rounded p-2" />
                </div>

                <div class="flex gap-2">
                    <button type="button" wire:click="removeItem({{ $index }})"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">
                        ✕
                    </button>
                </div>
            </div>
        @endforeach

        <button type="button" wire:click="addItem"
            class="bg-blue-600 text-white px-4 py-2 rounded my-2 hover:bg-blue-700">
            + {{ __('keywords.add_item') }}
        </button>

        <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors mt-4">
            {{ __('keywords.add') }}
        </button>
    </form>
</div>
