<?php

namespace PriceTracker;

use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    protected $fillable = [
        'host', 'price_xpath', 'price_array', 'title_xpath', 'title_array',
    ];
}
