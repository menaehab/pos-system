<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Customer;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($customer)
        ->withProperties([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.customer_created'));
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($customer)
        ->withProperties([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.customer_updated'));
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($customer)
        ->withProperties([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.customer_deleted'));
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($customer)
        ->withProperties([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.customer_restored'));
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($customer)
        ->withProperties([
            'name' => $customer->name,
            'phone' => $customer->phone,
            'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.customer_force_deleted'));
    }
}