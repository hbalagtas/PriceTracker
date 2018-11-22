<?php

namespace PriceTracker;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
	protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
        'product_id', 'site_id', 'price',
    ];

    public function site()
    {
    	return $this->belongsTo(Site::class);
    }
}
