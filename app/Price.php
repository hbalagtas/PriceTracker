<?php

namespace PriceTracker;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'product_id', 'site_id', 'price',
    ];
}
