<?php

use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'site_configs';
        $data = [
        	[
        		'host' => 'www.mec.ca',
        		'price_xpath' => '//*[@id="ProductDetailControls"]/div[2]/ul/li/text()',
        		'price_array' => '1',
        		'title_xpath' => '/html/head/title',
        		'title_array' => '0',
        	],

        	[
        		'host' => 'www.amazon.ca',
        		'price_xpath' => '//*[@id="priceblock_ourprice"]',
        		'price_array' => '0',
        		'title_xpath' => '/html/head/title',
        		'title_array' => '0',
        	],
        ];

        DB::table($table)->insert($data);
    }
}
