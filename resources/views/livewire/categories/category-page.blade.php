<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.categories') }}</h1>

    <livewire:categories.category-create />

    <x-success-alert />

    <x-table :data="$categories" :columns="['name']" />

    <livewire:categories.category-update />

    <livewire:categories.category-delete />

</div>
