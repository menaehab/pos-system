<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;

class RoleDelete extends Component
{
    public $role_id;

    #[On('deleteModal')]
    public function openDeleteModal($id)
    {
        $this->role_id = $id;
        $this->dispatch('delete-modal');
    }
    public function deleteRole()
    {
        $role = Role::find($this->role_id);
        $role->delete();
        $this->dispatch('roleRefresh');
        session()->flash('success', __('keywords.role_deleted_successfully'));
        $this->dispatch('close-modal');
        $this->dispatch('refreshRole');
    }
    public function render()
    {
        return view('livewire.roles.role-delete');
    }
}