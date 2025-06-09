<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_category') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_category') }}" action="addCategory">
        <x-text-input name="name" placeholder="{{ __('keywords.name') }}" />
    </x-add-modal>
</div>
