<div class="text-gray-900 mt-3 rounded-xl">
    <div class="flex justify-center align-content-center">
        <input type="text" wire:model.live.debounce.200ms="search" placeholder="{{ __('keywords.search') }}"
            class="border bg-white border-gray-300 rounded px-4 py-2 md:w-1/4  focus:outline-2 focus:-outline-offset-2 focus:outline-blue-500">
    </div>

    <div class="px-3 py-4 flex justify-center">
        <div class="w-full overflow-x-auto">
            <table class="min-w-max w-full text-md bg-white shadow-md rounded mb-4">
                <thead>
                    <tr class="border-b">
                        <th class="text-center p-3 px-5">#</th>
                        @foreach ($columns as $column)
                            <th class="text-center p-3 px-5">
                                {{ __('keywords.' . $column) }}</th>
                        @endforeach
                        <th class="text-center p-3 px-5">{{ __('keywords.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>
    </div>

    {{ $data->links() }}
</div>
