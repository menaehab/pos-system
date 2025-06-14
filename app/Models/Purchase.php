<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = ['id'];
    public $incrementing = false;

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function items() {
        return $this->hasMany(PurchaseItem::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

}