<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$crawler = Goutte::request('GET', 'https://www.mec.ca/en/product/5045-197/Edge-520-GPS');
	$price_text = $crawler->filterXpath('//*[@id="ProductDetailControls"]/div[2]/ul/li/text()')->extract(['_text']);
	
	preg_match('/\d+\.?\d*/', $price_text[1], $matches);
	dump($matches[0]);

	$crawler = Goutte::request('GET', 'https://www.amazon.ca/Garmin-Edge-520-Bike-GPS/dp/B010SDBGQU');
	$price_text = $crawler->filterXpath('//*[@id="priceblock_ourprice"]')->extract(['_text']);
	preg_match('/\d+\.?\d*/', $price_text[0], $matches);
	dump($matches[0]);

	$sites = [
		'www.amazon.ca' => [			
			'price_xpath' => '//*[@id="priceblock_ourprice"]',			
			'price_array' => 0,
			'title_xpath' => '/html/head/title',
			'title_array' => 0,
		],
		'www.mec.ca' => [			
			'price_xpath' => '//*[@id="ProductDetailControls"]/div[2]/ul/li/text()',
			'price_array' => 1,
			'title_xpath' => '/html/head/title',
			'title_array' => 0,
		],
	];

	$products = [
		'https://www.amazon.ca/Garmin-Edge-520-Bike-GPS/dp/B010SDBGQU',
		'https://www.mec.ca/en/product/5045-197/Edge-520-GPS'
	];

	foreach ($products as $product) {
		$domain_parts = parse_url($product);
		$host = $domain_parts['host'];
		$crawler = Goutte::request('GET', $product);
		$price_text = $crawler->filterXpath($sites[$host]['price_xpath'])->extract(['_text']);
		preg_match('/\d+\.?\d*/', $price_text[$sites[$host]['price_array']], $matches);
		$price = $matches[0];

		$title = $crawler->filter('title')->extract('_text')[$sites[$host]['title_array']];
		$title = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $title);
		dump($title);
		echo "TEST " . $price; 
	}


	//*[@id="our_price_display"]
    return view('welcome');
});
