<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.categories') }}</h1>

    <div class="flex">
        <button onclick="addModal()"
            class="bg-green-600 text-white px-4 py-2 rounded cursor-pointer hover:bg-green-700 transition-colors">
            {{ __('keywords.add_category') }}
        </button>
    </div>

    <x-add-modal wire:ignore title="{{ __('keywords.add_category') }}" action="addCategory">
        <x-text-input name="name" placeholder="{{ __('keywords.name') }}" />
    </x-add-modal>

    <x-success-alert />

    <x-table :data="$categories" :columns="['name']" />
</div>
