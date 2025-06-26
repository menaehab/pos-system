<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.users') }}</h1>
    <livewire:users.user-create />

    <x-success-alert />

    <x-table :data="$users" :columns="['name', 'email', 'role']">
        @foreach ($users as $key => $user)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $user->id }}>
                <x-table-cell :value="$key + $users->firstItem()" />
                <x-table-cell :value="$user->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$user->email ?? __('keywords.not_available')" />
                <x-table-cell :value="$user->roles->first()->name ?? __('keywords.not_available')" />
                <x-table-actions type="id" :slug="$user->id" :show="false" />
            </tr>
        @endforeach
    </x-table>


    <livewire:users.user-update />

    <livewire:users.user-delete />

</div>
