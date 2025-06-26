<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_user') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_user') }}" action="addUser">
        <x-input wire:model="name" type="text" name="name" placeholder="{{ __('keywords.name') }}" />
        <x-select wire:model="role" name="role" placeholder="{{ __('keywords.role') }}" :options="$roles" />
        <x-input wire:model="email" type="email" name="email" placeholder="{{ __('keywords.email') }}" />
        <x-input wire:model="password" type="password" name="password" placeholder="{{ __('keywords.password') }}" />
        <x-input wire:model="password_confirmation" type="password" name="password_confirmation"
            placeholder="{{ __('keywords.password_confirmation') }}" />
    </x-add-modal>

</div>
