<?php

namespace PriceTracker;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'product_id', 'url',
    ];
}
