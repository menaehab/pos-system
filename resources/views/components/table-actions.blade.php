<td class="text-center p-3 px-5 flex justify-center gap-2">
    @if ($show)
        <a wire:click="$dispatch('showModal', { {{ $type }}: '{{ $slug }}' })"
            class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
            <i class="fa-solid fa-eye"></i>
        </a>
    @endif
    <a wire:click="$dispatch('editModal', { {{ $type }}: '{{ $slug }}' })"
        class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
        <i class="fa-solid fa-pen"></i>
    </a>

    <a wire:click="$dispatch('deleteModal', { {{ $type }}: '{{ $slug }}' })"
        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
        <i class="fa-solid fa-trash"></i>
    </a>
</td>
