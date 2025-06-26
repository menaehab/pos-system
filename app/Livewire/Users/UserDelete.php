<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class UserDelete extends Component
{
    public $id;

    #[On('deleteModal')]
    public function openDeleteModal($id)
    {
        $this->id = $id;
        $this->dispatch('delete-modal');
    }
    public function deleteUser()
    {
        $user = User::find($this->id);
        $user->delete();
        $this->dispatch('success', ['message' => __('keywords.user_deleted_successfully')]);
        $this->dispatch('userRefresh');
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.users.user-delete');
    }
}