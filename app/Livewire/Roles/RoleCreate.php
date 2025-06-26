<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $name = '';
    public $permissions = [];
    public function rules()
    {
        return (new RoleRequest())->rules();
    }
    public function messages()
    {
        return (new RoleRequest())->messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    #[On('AddModal')]
    public function openAddModal()
    {
        $this->dispatch('add-modal');
    }
    #[On('clear')]
    public function clear()
    {
        $this->reset();
        $this->resetValidation();
        $this->dispatch('close-modal');
    }
    public function addRole()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
        ]);

        $permissions = Permission::whereIn('id', $this->permissions)->get();
        $role->syncPermissions($permissions);

        $this->dispatch('close-modal');
        $this->dispatch('roleRefresh');
        $this->reset(['name', 'permissions']);
        $this->resetValidation();
        session()->flash('success', __('keywords.role_added_successfully'));
    }
    public function render()
    {
        $allPermissions = Permission::all();
        return view('livewire.roles.role-create', compact('allPermissions'));
    }
}