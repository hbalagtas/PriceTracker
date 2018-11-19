<?php

namespace PriceTracker\Console\Commands;

use Illuminate\Console\Command;
use PriceTracker\Product;
use PriceTracker\Jobs\GetProductPrice;

class CheckProductPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PriceTracker:checkproductprices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check current pricing for all products';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $products = Product::all();
        foreach($products as $product) {
            GetProductPrice::dispatch($product)->delay(now()->addMinutes(1));
        }
    }
}
