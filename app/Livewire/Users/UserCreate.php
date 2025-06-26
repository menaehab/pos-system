<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role_id;
    public function rules()
    {
        return (new UserRequest())->rules();
    }
    public function messages()
    {
        return (new UserRequest())->messages();
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

    public function addUser()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $role = Role::find($this->role_id);
        $user->syncRoles($role);

        $this->dispatch('close-modal');
        $this->dispatch('userRefresh');
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'role_id']);
        $this->resetValidation();
        session()->flash('success', __('keywords.user_added_successfully'));
    }
    public function render()
    {
        $roles = Role::all();
        return view('livewire.users.user-create', compact('roles'));
    }
}