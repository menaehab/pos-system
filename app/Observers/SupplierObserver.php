<?php

namespace App\Observers;

use App\Models\Supplier;

class SupplierObserver
{
    /**
     * Handle the Supplier "created" event.
     */
    public function created(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties($supplier->toArray())
        ->log(__('keywords.supplier_created'));
    }

    /**
     * Handle the Supplier "updated" event.
     */
    public function updated(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties($supplier->toArray())
        ->log(__('keywords.supplier_updated'));
    }

    /**
     * Handle the Supplier "deleted" event.
     */
    public function deleted(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties($supplier->toArray())
        ->log(__('keywords.supplier_deleted'));
    }

    /**
     * Handle the Supplier "restored" event.
     */
    public function restored(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties($supplier->toArray())
        ->log(__('keywords.supplier_restored'));
    }

    /**
     * Handle the Supplier "force deleted" event.
     */
    public function forceDeleted(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties($supplier->toArray())
        ->log(__('keywords.supplier_force_deleted'));
    }
}
