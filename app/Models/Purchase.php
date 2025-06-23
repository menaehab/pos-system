<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Observers\PurchaseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(PurchaseObserver::class)]
class Purchase extends Model
{
    protected $guarded = ['id'];

    public function items() {
        return $this->hasMany(PurchaseItem::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

}
