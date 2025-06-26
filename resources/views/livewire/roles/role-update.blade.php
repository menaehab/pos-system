<x-edit-modal title="{{ __('keywords.edit_role') }}" action="editRole">
    <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
    <div class="mt-4">
        <select class="w-full p-2 border rounded  focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
            name="permissions[]" id="permissions[]" wire:model.lazy="permissions" multiple>
            @foreach ($allPermissions as $option)
                <option value="{{ $option->id }}" @checked(in_array($option->id, $permissions))>{{ $option->display_name }}</option>
            @endforeach
        </select>
        <x-error-message name="permissions" />
    </div>
</x-edit-modal>
