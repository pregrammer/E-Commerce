<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function index()
    {
        $product_cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $shopping_cart_data = json_decode($product_cookie_data, true);
        $has_profile = DB::table('user_details')->where('user_id', auth()->id())->first();
        if ($has_profile) {
            $is_profile_complete = true;
        } else {
            $is_profile_complete = false;
        }
        $modal_products = [];
        if ($shopping_cart_data) {
            $item_id_list = array_column($shopping_cart_data, 'item_id');
            $modal_products = Product::whereIn('id', $item_id_list)->get();
        }

        return view('basket', [
            'shopping_cart_data' => $shopping_cart_data,
            'is_profile_complete' => $is_profile_complete,
            'modal_products' => $modal_products
        ]);
    }

    public function add_to_basket($pid)
    {
        //https://www.fundaofwebit.com/post/how-to-make-shopping-cart-using-cookie-in-laravel-with-ajax-request
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $pid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            return back()->with('status', '!این محصول قبلا به سبد خرید شما اضافه شده');
        } else {
            $product = Product::find($pid);
            $prod_name = $product->name;
            $priceval = $product->price;

            $firstimg = DB::table('products_images')->where('product_id', $pid)->select('firstImage')->first();
            $prod_image = $firstimg->firstImage;

            if ($product) {
                $item_array = array(
                    'item_id' => $pid,
                    'item_name' => $prod_name,
                    'item_price' => $priceval,
                    'item_image' => $prod_image
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                $minutes = 60;
                Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                return back()->with('status', '!محصول مورد نظر با موفقیت به سبد خرید شما اضافه شد');
            }
        }
    }

    public function delete_from_basket($pid)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $pid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $pid) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    return back()->with('status', 'محصول مورد نظر با موفقیت از سبد خرید شما حذف شد!');
                }
            }
        }
    }
}
