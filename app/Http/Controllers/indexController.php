<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Product;
use App\Models\Sliderimage;
use App\Models\Weblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class indexController extends Controller
{
    
    public function index()
    {
        //ads
        $ads = Advertisement::first();
        $sliderImages = Sliderimage::all();

        // wow
        $wow_products = Product::where('discountPercentage', '>', 10)->take(10)->orderBy('discountPercentage', 'desc')->get();
        $wow_products_images = array();
        foreach ($wow_products as $wow_product)
        {
            $wow_products_images[] = DB::table('products_images')->where('product_id', $wow_product->id)->select('firstImage')->first();
        }

        // new
        $new_products = Product::latest()->take(10)->get();
        $new_products_images = array();
        foreach ($new_products as $new_product)
        {
            $new_products_images[] = DB::table('products_images')->where('product_id', $new_product->id)->select('firstImage')->first();
        }

        // most-sale
        $most_sale_products = Product::orderBy('sell_rate', 'desc')->take(10)->get();
        $most_sale_products_images = array();
        foreach ($most_sale_products as $most_sale_product)
        {
            $most_sale_products_images[] = DB::table('products_images')->where('product_id', $most_sale_product->id)->select('firstImage')->first();
        }

        // 3 latest weblogs
        $last_three_weblogs = Weblog::latest()->take(3)->get();


        return view('index',[
            'ads' => $ads,
            'sliderImages' => $sliderImages,
            'wow_products' =>  $wow_products,
            'wow_products_images' =>  $wow_products_images,
            'new_products' => $new_products,
            'new_products_images' =>  $new_products_images,
            'most_sale_products' =>  $most_sale_products,
            'most_sale_products_images' =>  $most_sale_products_images,
            'last_three_weblogs' =>  $last_three_weblogs
        ]);
    }


}
