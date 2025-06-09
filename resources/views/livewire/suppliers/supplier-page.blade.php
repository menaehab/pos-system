<div class="container mx-auto p-6">
    <h1 class="text-5xl font-bold text-center my-6">{{ __('keywords.suppliers') }}</h1>

    <livewire:suppliers.supplier-create />

    <x-success-alert />

    <x-table :data="$suppliers" :columns="['name', 'phone']" />

    <livewire:suppliers.supplier-update />

    <livewire:suppliers.supplier-delete />
</div>
