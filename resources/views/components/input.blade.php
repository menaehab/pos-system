<div>
    <input type="{{ $type }}" wire:model.lazy="{{ $name }}" placeholder="{{ $placeholder }}"
        class="w-full p-2 border rounded mt-4 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500">
    <x-error-message :name="$name" />
</div>
