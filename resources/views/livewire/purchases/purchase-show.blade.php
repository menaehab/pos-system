<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.purchase_details') }}</h1>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold">{{ __('keywords.supplier') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->supplier->name ?? __('keywords.not_available') }}</p>
        </div>

        <div>
            <label class="block font-semibold">{{ __('keywords.purchase_date') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->purchase_date }}</p>
        </div>

        <div>
            <label class="block font-semibold">{{ __('keywords.total_amount') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->total_amount }}</p>
        </div>

        <div>
            <label class="block font-semibold">{{ __('keywords.paid_amount') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->paid_amount }}</p>
        </div>

        <div>
            <label class="block font-semibold">{{ __('keywords.due_amount') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->due_amount }}</p>
        </div>

        <div class="col-span-2">
            <label class="block font-semibold">{{ __('keywords.note') }}:</label>
            <p class="p-2 border rounded">{{ $purchase->note }}</p>
        </div>
    </div>

    <hr class="my-6">

    <h2 class="text-2xl font-bold mb-4">{{ __('keywords.purchase_items') }}</h2>

    @foreach ($purchase->items as $item)
        <div class="flex justify-around gap-4 mb-4 items-end border p-3 rounded shadow-sm">
            <div class="flex-1">
                <label class="font-semibold">{{ __('keywords.product') }}:</label>
                <p class="p-2 border rounded">{{ $item->product->name ?? __('keywords.not_available') }}</p>
            </div>

            <div class="flex-1">
                <label class="font-semibold">{{ __('keywords.cartoon_quantity') }}:</label>
                <p class="p-2 border rounded">{{ $item->cartoon_quantity ? __('keywords.yes') : __('keywords.no') }}
                </p>
            </div>

            <div class="flex-1">
                <label class="font-semibold">{{ __('keywords.quantity') }}:</label>
                <p class="p-2 border rounded">{{ $item->quantity }}</p>
            </div>

            <div class="flex-1">
                <label class="font-semibold">{{ __('keywords.price') }}:</label>
                <p class="p-2 border rounded">{{ $item->price }}</p>
            </div>

            <div class="flex-1">
                <label class="font-semibold">{{ __('keywords.total_amount') }}:</label>
                <p class="p-2 border rounded">{{ $item->quantity * $item->price }}</p>
            </div>
        </div>
    @endforeach
</div>
