<?php

namespace PriceTracker;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'targetprice',
	];

	public function prices()
	{
		return $this->hasMany(Price::class);
	}

	public function sites()
	{
		return $this->hasMany(Site::class);
	}
}
