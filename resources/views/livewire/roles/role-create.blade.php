<div>
    <button wire:click="$dispatch('AddModal')"
        class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
        {{ __('keywords.add_role') }}
    </button>

    <x-add-modal title="{{ __('keywords.add_role') }}" action="addRole">
        <x-input wire:model="name" type="text" name="name" placeholder="{{ __('keywords.name') }}" />
        <select class="w-full p-2 border rounded  focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
            name="permissions[]" id="permissions[]" wire:model.lazy="permissions" multiple>
            @foreach ($allPermissions as $option)
                <option value="{{ $option->id }}">{{ $option->display_name }}</option>
            @endforeach
        </select>
        <x-error-message name="permissions" />
    </x-add-modal>

</div>
