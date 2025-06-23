<?php

namespace App\Observers;

use App\Models\Supplier;
use Carbon\Carbon;

class SupplierObserver
{
    /**
     * Handle the Supplier "created" event.
     */
    public function created(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties([
            'name' => $supplier->name,
            'phone' => $supplier->phone,
            'created_at' => Carbon::parse($supplier->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.supplier_created'));
    }

    /**
     * Handle the Supplier "updated" event.
     */
    public function updated(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties([
            'name' => $supplier->name,
            'phone' => $supplier->phone,
            'created_at' => Carbon::parse($supplier->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.supplier_updated'));
    }

    /**
     * Handle the Supplier "deleted" event.
     */
    public function deleted(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties([
            'name' => $supplier->name,
            'phone' => $supplier->phone,
            'created_at' => Carbon::parse($supplier->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.supplier_deleted'));
    }

    /**
     * Handle the Supplier "restored" event.
     */
    public function restored(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties([
            'name' => $supplier->name,
            'phone' => $supplier->phone,
            'created_at' => Carbon::parse($supplier->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.supplier_restored'));
    }

    /**
     * Handle the Supplier "force deleted" event.
     */
    public function forceDeleted(Supplier $supplier): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($supplier)
        ->withProperties([
            'name' => $supplier->name,
            'phone' => $supplier->phone,
            'created_at' => Carbon::parse($supplier->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.supplier_force_deleted'));
    }
}
