<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function first_step(Request $request)
    {
        $numbers = $request->numbers;
        $product_cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $shopping_cart_data = json_decode($product_cookie_data, true);
        $item_id_list = array_column($shopping_cart_data, 'item_id');
        $s = 0;

        foreach ($numbers as $number) {

            $prod_id = $item_id_list[$s];
            $product = Product::find($prod_id);
            $prod_inventory = $product->inventory;

            if ($number > $prod_inventory) {
                return response()->json([
                    'name' => $product->name,
                    'has_error' => true
                ]);
            }
            $s++;

        }

        $discounts = Product::select('price', 'discountPercentage')->whereIn('id', $item_id_list)->get();
        $prod_discounts = array();
        $prod_prices = array();
        foreach ($discounts as $discount) {
            $prod_discounts[] = $discount->discountPercentage;
            $prod_prices[] = $discount->price;
        }

        return response()->json([
            'name' => $product->name,
            'prod_discounts' => $prod_discounts,
            'prod_prices' => $prod_prices,
            'has_error' => false
        ]);

    }

    public function sss($t)
    {
        dd($t);
    }

}
