<x-show-modal title="{{ __('keywords.show_role') }}" action="showRole">
    <x-read-only-input name="name" label="{{ __('keywords.name') }}"
        value="{{ $role->name ?? __('keywords.not_available') }}" />
    <select class="w-full p-2 border rounded  focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
        name="permissions[]" id="permissions[]" wire:model.lazy="permissions" multiple disabled>
        @foreach ($allPermissions as $option)
            @if (in_array($option->id, $permissions))
                <option value="{{ $option->id }}">{{ $option->display_name }}</option>
            @endif
        @endforeach
    </select>
</x-show-modal>
