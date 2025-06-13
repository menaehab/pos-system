<x-edit-modal title="{{ __('keywords.edit_sub_category') }}" action="editSubCategory">
    <x-input type="text" name="name" placeholder="{{ __('keywords.name') }}" />
    <x-select name="category_id" placeholder="{{ __('keywords.category') }}" :options="$categories" />
</x-edit-modal>
