<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RolePage extends Component
{
    use WithPagination;
    public $search = '';
    protected $listeners = ['roleRefresh' => '$refresh'];
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $roles = Role::where('name', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);
        return view('livewire.roles.role-page', compact('roles'))->layout('pages.layout', [
            'title' => __('keywords.roles')
        ]);
    }
}