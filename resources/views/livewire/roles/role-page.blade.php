<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.roles') }}</h1>
    <livewire:roles.role-create />

    <x-success-alert />

    <x-table :data="$roles" :columns="['name']">
        @foreach ($roles as $key => $role)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $role->id }}>
                <x-table-cell :value="$key + $roles->firstItem()" />
                <x-table-cell :value="$role->name ?? __('keywords.not_available')" />
                <x-table-actions type="id" :slug="$role->id" :show="true" />
            </tr>
        @endforeach
    </x-table>

    <livewire:roles.role-show lazy />

    <livewire:roles.role-update />

    <livewire:roles.role-delete />

</div>
