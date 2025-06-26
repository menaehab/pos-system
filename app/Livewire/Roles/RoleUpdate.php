<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleUpdate extends Component
{
    public $role_id;
    public $role;
    public $name;
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
    #[On('editModal')]
    public function openEditModal($id)
    {
        $this->role_id = $id;
        $this->role = Role::find($this->role_id);
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions->pluck('id')->toArray();
        $this->dispatch('edit-modal');
    }
    public function editRole()
    {
        $this->validate();
        $this->role->update([
            'name' => $this->name,
        ]);
        $permissions = Permission::whereIn('id', $this->permissions)->get();
        $this->role->syncPermissions($permissions);
        $this->dispatch('close-modal');
        $this->dispatch('roleRefresh');
        $this->reset(['name', 'permissions']);
        $this->resetValidation();
        session()->flash('success', __('keywords.role_updated_successfully'));
    }
    public function render()
    {
        $allPermissions = Permission::all();
        return view('livewire.roles.role-update', compact('allPermissions'));
    }
}