<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.sub_categories') }}</h1>

    <livewire:sub-categories.sub-category-create />

    <x-success-alert />

    <x-table :data="$subCategories" :columns="['name', 'category']">
        @foreach ($subCategories as $key => $subCategory)
            <tr class="border-b hover:bg-blue-100" wire:key={{ $subCategory->id }}>
                <x-table-cell :value="$key + $subCategories->firstItem()" />
                <x-table-cell :value="$subCategory->name ?? __('keywords.not_available')" />
                <x-table-cell :value="$subCategory->category->name ?? __('keywords.not_available')" />
                <x-table-actions type="slug" :slug="$subCategory->slug" :show="false" />
            </tr>
        @endforeach
    </x-table>

    <livewire:sub-categories.sub-category-update />

    <livewire:sub-categories.sub-category-delete />

</div>
