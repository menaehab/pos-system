<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(CustomerObserver::class)]
class Customer extends Model
{
    use HasSlug;
    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function ledgers()
    {
        return $this->hasMany(CustomerLedger::class);
    }
}