<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($category)
        ->withProperties([
            'name' => $category->name,
            'supplier' => $category->supplier->name,
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.category_created'));
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($category)
        ->withProperties([
            'name' => $category->name,
            'supplier' => $category->supplier->name,
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.category_updated'));
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($category)
        ->withProperties([
            'name' => $category->name,
            'supplier' => $category->supplier->name,
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.category_deleted'));
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($category)
        ->withProperties([
            'name' => $category->name,
            'supplier' => $category->supplier->name,
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.category_restored'));
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($category)
        ->withProperties([
            'name' => $category->name,
            'supplier' => $category->supplier->name,
            'created_at' => Carbon::parse($category->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.category_force_deleted'));
    }
}
