<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.activity_logs') }}</h1>

    <x-success-alert />

    <x-table :data="$activityLogs" :columns="['causer', 'description']">
        @foreach ($activityLogs as $key => $activityLog)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $activityLog->id }}>
                <x-table-cell :value="$key + $activityLogs->firstItem()" />
                <x-table-cell :value="$activityLog->causer->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$activityLog->description ?? __('keywords.not_available')" />
                <th>
                    <a href="{{ route('activity-logs.show', $activityLog->id) }}" wire:navigate
                        class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded cursor-pointer">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </th>
            </tr>
        @endforeach
    </x-table>

</div>
