<div>
    <select class="w-full p-2 border rounded mt-4 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500"
        name="{{ $name }}" id="{{ $name }}" wire:model.lazy="{{ $name }}">
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
    <x-error-message :name="$name" />
</div>
