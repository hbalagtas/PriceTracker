<?php

namespace PriceTracker\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PriceTracker\Product;
use PriceTracker\SiteConfig;

class GetProductPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("Processed product " . $this->product->name);

        foreach($this->product->sites as $site){
            \Log::info($site->url);
            $domain_parts = parse_url($site->url);
            $host = $domain_parts['host'];
            $site_config = SiteConfig::whereHost($host)->first();
            if ( !is_null($site_config) ) {
                $crawler = \Goutte::request('GET', $site->url);
                $price_text = $crawler->filterXpath($site_config->price_xpath)->extract(['_text']);
                preg_match('/\d+\.?\d*/', $price_text[$site_config->price_array], $matches);
                $price = $matches[0];
                Price::create(
                    [
                        'product_id' => $site->product_id,
                        'site_id' => $site->id,
                        'price' => $price,
                    ]
                );
            }
        }

    }
}
