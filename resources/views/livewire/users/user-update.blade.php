<x-edit-modal title="{{ __('keywords.update_user') }}" action="updateUser">
    <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" wire:model="name" />
    <x-select type="select" name="role_id" placeholder="{{ __('keywords.role') }}" wire:model="role_id"
        :options="$roles" />
    <x-input type="email" name="email" placeholder="{{ __('keywords.email') }}" wire:model="email" />
    <x-input type="password" name="password" placeholder="{{ __('keywords.password') }}" wire:model="password" />
    <x-input type="password" name="password_confirmation" placeholder="{{ __('keywords.password_confirmation') }}"
        wire:model="password_confirmation" />
</x-edit-modal>
