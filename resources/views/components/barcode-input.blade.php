<div>
    <input type="text" wire:model.lazy="barcode" placeholder="{{ __('keywords.barcode') }}"
        class="w-full p-2 border rounded mt-4 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
        x-ref="barcodeInput">
    <x-error-message name="barcode" />
</div>
