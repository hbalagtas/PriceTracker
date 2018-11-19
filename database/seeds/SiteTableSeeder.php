<?php

use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'sites';
        $data = [
        	[
        		'product_id' => 1,
        		'url' => 'https://www.mec.ca/en/product/5045-197/Edge-520-GPS',
        	],
        	[
        		'product_id' => 1,
        		'url' => 'https://www.amazon.ca/Garmin-Edge-520-Bike-GPS/dp/B010SDBGQU',
        	],
        ];
        DB::table($table)->insert($data);
    }
}
