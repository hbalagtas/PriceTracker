<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'products';
        $data = [
        	[
        		'id' => 1,
        		'name' => 'Garmin Edge 520',
        		'targetprice' => '250',
        	]
        ];
        DB::table($table)->insert($data);
    }
}
