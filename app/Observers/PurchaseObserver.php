<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Purchase;

class PurchaseObserver
{
    /**
     * Handle the Purchase "created" event.
     */
    public function created(Purchase $purchase): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($purchase)
        ->withProperties([
            'total_amount' => $purchase->total_amount,
            'paid_amount' => $purchase->paid_amount,
            'due_amount' => $purchase->due_amount,
            'purchase_date' => Carbon::parse($purchase->purchase_date)->format('Y-m-d H:i:s A'),
            'note' => $purchase->note,
            'supplier' => $purchase->supplier->name,
            'created_at' => Carbon::parse($purchase->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.purchase_created'));
    }

    /**
     * Handle the Purchase "updated" event.
     */
    public function updated(Purchase $purchase): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($purchase)
        ->withProperties([
            'total_amount' => $purchase->total_amount,
            'paid_amount' => $purchase->paid_amount,
            'due_amount' => $purchase->due_amount,
            'purchase_date' => Carbon::parse($purchase->purchase_date)->format('Y-m-d H:i:s A'),
            'note' => $purchase->note,
            'supplier' => $purchase->supplier->name,
            'created_at' => Carbon::parse($purchase->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.purchase_updated'));
    }

    /**
     * Handle the Purchase "deleted" event.
     */
    public function deleted(Purchase $purchase): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($purchase)
        ->withProperties([
            'total_amount' => $purchase->total_amount,
            'paid_amount' => $purchase->paid_amount,
            'due_amount' => $purchase->due_amount,
            'purchase_date' => Carbon::parse($purchase->purchase_date)->format('Y-m-d H:i:s A'),
            'note' => $purchase->note,
            'supplier' => $purchase->supplier->name,
            'created_at' => Carbon::parse($purchase->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.purchase_deleted'));
    }

    /**
     * Handle the Purchase "restored" event.
     */
    public function restored(Purchase $purchase): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($purchase)
        ->withProperties([
            'total_amount' => $purchase->total_amount,
            'paid_amount' => $purchase->paid_amount,
            'due_amount' => $purchase->due_amount,
            'purchase_date' => Carbon::parse($purchase->purchase_date)->format('Y-m-d H:i:s A'),
            'note' => $purchase->note,
            'supplier' => $purchase->supplier->name,
            'created_at' => Carbon::parse($purchase->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.purchase_restored'));
    }

    /**
     * Handle the Purchase "force deleted" event.
     */
    public function forceDeleted(Purchase $purchase): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($purchase)
        ->withProperties([
            'total_amount' => $purchase->total_amount,
            'paid_amount' => $purchase->paid_amount,
            'due_amount' => $purchase->due_amount,
            'purchase_date' => Carbon::parse($purchase->purchase_date)->format('Y-m-d H:i:s A'),
            'note' => $purchase->note,
            'supplier' => $purchase->supplier->name,
            'created_at' => Carbon::parse($purchase->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.purchase_force_deleted'));
    }
}