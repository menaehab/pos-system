<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleShow extends Component
{
    public $role_id;
    public $role;
    public $name;
    public $permissions = [];
    #[On('showModal')]

    public function showRole($id)
    {
        $this->role_id = $id;
        $this->role = Role::find($this->role_id);
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions->pluck('id')->toArray();
        $this->dispatch('show-modal');
    }
    public function render()
    {
        $allPermissions = Permission::all();
        return view('livewire.roles.role-show',compact('allPermissions'));
    }
}