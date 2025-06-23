<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\SubCategory;

class SubCategoryObserver
{
    /**
     * Handle the SubCategory "created" event.
     */
    public function created(SubCategory $subCategory): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($subCategory)
        ->withProperties([
            'name' => $subCategory->name,
            'category' => $subCategory->category->name,
            'created_at' => Carbon::parse($subCategory->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.sub_category_created'));
    }

    /**
     * Handle the SubCategory "updated" event.
     */
    public function updated(SubCategory $subCategory): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($subCategory)
        ->withProperties([
            'name' => $subCategory->name,
            'category' => $subCategory->category->name,
            'created_at' => Carbon::parse($subCategory->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.sub_category_updated'));
    }

    /**
     * Handle the SubCategory "deleted" event.
     */
    public function deleted(SubCategory $subCategory): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($subCategory)
        ->withProperties([
            'name' => $subCategory->name,
            'category' => $subCategory->category->name,
            'created_at' => Carbon::parse($subCategory->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.sub_category_deleted'));
    }

    /**
     * Handle the SubCategory "restored" event.
     */
    public function restored(SubCategory $subCategory): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($subCategory)
        ->withProperties([
            'name' => $subCategory->name,
            'category' => $subCategory->category->name,
            'created_at' => Carbon::parse($subCategory->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.sub_category_restored'));
    }

    /**
     * Handle the SubCategory "force deleted" event.
     */
    public function forceDeleted(SubCategory $subCategory): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($subCategory)
        ->withProperties([
            'name' => $subCategory->name,
            'category' => $subCategory->category->name,
            'created_at' => Carbon::parse($subCategory->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.sub_category_force_deleted'));
    }
}
