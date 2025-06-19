<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_customer') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_customer') }}" action="addCustomer">
        <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
        <x-input type="text" name="phone" placeholder="{{ __('keywords.phone') }}" />
    </x-add-modal>
</div>
