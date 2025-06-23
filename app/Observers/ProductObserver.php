<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($product)
        ->withProperties([
            'name' => $product->name,
            'supplier' => $product->subCategory->category->supplier->name,
            'category' => $product->subCategory->category->name,
            'sub_category' => $product->subCategory->name,
            'barcode' => $product->barcode,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'quantity' => $product->quantity,
            'pieces_per_carton' => $product->pieces_per_carton,
            'created_at' => Carbon::parse($product->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.product_created'));
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($product)
        ->withProperties([
            'name' => $product->name,
            'supplier' => $product->subCategory->category->supplier->name,
            'category' => $product->subCategory->category->name,
            'sub_category' => $product->subCategory->name,
            'barcode' => $product->barcode,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'quantity' => $product->quantity,
            'pieces_per_carton' => $product->pieces_per_carton,
            'created_at' => Carbon::parse($product->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.product_updated'));
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($product)
        ->withProperties([
            'name' => $product->name,
            'supplier' => $product->subCategory->category->supplier->name,
            'category' => $product->subCategory->category->name,
            'sub_category' => $product->subCategory->name,
            'barcode' => $product->barcode,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'quantity' => $product->quantity,
            'pieces_per_carton' => $product->pieces_per_carton,
            'created_at' => Carbon::parse($product->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.product_deleted'));
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($product)
        ->withProperties([
            'name' => $product->name,
            'supplier' => $product->subCategory->category->supplier->name,
            'category' => $product->subCategory->category->name,
            'sub_category' => $product->subCategory->name,
            'barcode' => $product->barcode,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'quantity' => $product->quantity,
            'pieces_per_carton' => $product->pieces_per_carton,
            'created_at' => Carbon::parse($product->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.product_restored'));
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        activity()->causedBy(auth()->user())
        ->performedOn($product)
        ->withProperties([
            'name' => $product->name,
            'supplier' => $product->subCategory->category->supplier->name,
            'category' => $product->subCategory->category->name,
            'sub_category' => $product->subCategory->name,
            'barcode' => $product->barcode,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'quantity' => $product->quantity,
            'pieces_per_carton' => $product->pieces_per_carton,
            'created_at' => Carbon::parse($product->created_at)->format('Y-m-d H:i:s A'),
        ])
        ->log(__('keywords.product_force_deleted'));
    }
}
