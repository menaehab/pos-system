<div class="text-gray-900 mt-3 rounded-xl">
    <div class="flex justify-center align-content-center">
        <input type="text" wire:model.live.debounce.200ms="search" placeholder="{{ __('keywords.search') }}"
            class="border bg-white border-gray-300 rounded px-4 py-2 md:w-1/4  focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500">
    </div>
    <div class="px-3 py-4 flex justify-center">
        <table class="w-full text-md bg-white shadow-md rounded mb-4">
            <thead>
                <tr class="border-b">
                    <th class="text-center p-3 px-5">#</th>
                    @foreach ($columns as $column)
                        <th class="text-center p-3 px-5">{{ __('keywords.' . $column) }}</th>
                    @endforeach
                    <th class="text-center p-3 px-5">{{ __('keywords.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr class="border-b hover:bg-blue-100">
                        <td class="text-center p-3 px-5"><span>{{ $key + $data->firstItem() }}</span></td>
                        @foreach ($columns as $column)
                            <td class="text-center p-3 px-5"><span>{{ $item->$column }}</span></td>
                        @endforeach
                        <td class="text-center p-3 px-5 flex justify-center gap-2">
                            <a wire:click="$dispatch('editModal', { slug: '{{ $item->slug }}' })"
                                class="text-sm bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded cursor-pointer">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <a wire:click="$dispatch('deleteModal', { slug: '{{ $item->slug }}' })"
                                class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded cursor-pointer">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $data->links() }}
</div>
