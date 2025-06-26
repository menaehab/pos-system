<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.roles') }}</h1>
    <livewire:roles.role-create />

    <x-success-alert />

    <x-table :data="$roles" :columns="['name']">
        @foreach ($roles as $key => $role)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $role->id }}>
                <x-table-cell :value="$key + $roles->firstItem()" />
                <x-table-cell :value="$role->name ?? __('keywords.not_available')" />

                <td class="text-center p-3 px-5 flex justify-center gap-2">
                    <a wire:click="$dispatch('showModal', { id: '{{ $role->id }}' })"
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a wire:click="$dispatch('editModal', { id: '{{ $role->id }}' })"
                        class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a wire:click="$dispatch('deleteModal', { id: '{{ $role->id }}' })"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </x-table>

    <livewire:roles.role-show lazy />

    <livewire:roles.role-update />

    <livewire:roles.role-delete />

</div>
