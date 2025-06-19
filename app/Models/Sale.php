<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function ($sale) {
            $sale->invoice_number = self::generateInvoiceNumber();
        });
    }

    public static function generateInvoiceNumber()
    {
        $date = Carbon::now()->format('Ymd');
        $countToday = self::whereDate('created_at',today())->count() + 1;
        return $date . str_pad($countToday, 5, '0', STR_PAD_LEFT);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // public function saleItems()
    // {
    //     return $this->hasMany(SaleItem::class);
    // }
}
