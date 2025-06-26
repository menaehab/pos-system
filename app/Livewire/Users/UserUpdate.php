<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserUpdate extends Component
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role_id;
    public function rules()
{
    return (new UserRequest($this->id))->rules();
}
    public function messages()
    {
        return (new UserRequest($this->id))->messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    #[On('editModal')]
    public function openEditModal($id)
    {
        $this->id = $id;
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->roles->first()->id;
        $this->dispatch('edit-modal');
    }
    public function updateUser()
    {
        $this->validate();
        $user = User::find($this->id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        if ($this->password) {
            $user->update([
                'password' => Hash::make($this->password),
            ]);
        }
        $role = Role::find($this->role_id);
        $user->syncRoles($role);
        $this->dispatch('close-modal');
        $this->dispatch('userRefresh');
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'role_id']);
        $this->resetValidation();
        session()->flash('success', __('keywords.user_updated_successfully'));
    }
    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.user-update', compact('roles'));
    }
}
