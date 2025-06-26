<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.categories') }}</h1>

    <livewire:categories.category-create />

    <x-success-alert />

    <x-table :data="$categories" :columns="['name', 'supplier']">
        @foreach ($categories as $key => $category)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $category->id }}>
                <x-table-cell :value="$key + $categories->firstItem()" />
                <x-table-cell :value="$category->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$category->supplier->name ?? __('keywords.not_available')" />
                <x-table-actions type="slug" :slug="$category->slug" :show="false" />
            </tr>
        @endforeach
    </x-table>

    <livewire:categories.category-update />

    <livewire:categories.category-delete />

</div>
