<x-edit-modal title="{{ __('keywords.edit_category') }}" action="editCategory">
    <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
    <x-select name="supplier_id" placeholder="{{ __('keywords.supplier') }}" :options="$suppliers" />
</x-edit-modal>
