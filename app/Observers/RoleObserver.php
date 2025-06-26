<?php

namespace App\Observers;

use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $role): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($role)
        ->withProperties([
            'name' => $role->name,
            'created_at' => Carbon::parse($role->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.role_created'));
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $role): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($role)
        ->withProperties([
            'name' => $role->name,
            'created_at' => Carbon::parse($role->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.role_updated'));
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $role): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($role)
        ->withProperties([
            'name' => $role->name,
            'created_at' => Carbon::parse($role->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.role_deleted'));
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $role): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($role)
        ->withProperties([
            'name' => $role->name,
            'created_at' => Carbon::parse($role->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.role_restored'));
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $role): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($role)
        ->withProperties([
            'name' => $role->name,
            'created_at' => Carbon::parse($role->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.role_force_deleted'));
    }
}
