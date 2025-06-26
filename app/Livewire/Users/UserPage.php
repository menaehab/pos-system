<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserPage extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['userRefresh' => '$refresh'];
    public function updatedSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
        ->orWhereHas('roles', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.users.user-page', compact('users'))->layout('pages.layout', [
            'title' => __('keywords.users'),
        ]);
    }
}