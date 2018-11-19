<?php

namespace PriceTracker\Http\Controllers;

use PriceTracker\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \PriceTracker\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $priceTable = \Lava::DataTable();

        $priceTable->addDateColumn('Price')
            ->addNumberColumn('Date');
        

        foreach ($product->prices as $price) {
            $priceTable->addRow([$price->price, $price->created_at]);
        }

        $chart = Lava::LineChart();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PriceTracker\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PriceTracker\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PriceTracker\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
