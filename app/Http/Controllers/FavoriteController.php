<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Weblog;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $product_cookie_data = stripslashes(Cookie::get('favorite_product_cart'));
        $product_favorite_data = json_decode($product_cookie_data, true);

        $weblog_cookie_data = stripslashes(Cookie::get('favorite_weblog_cart'));
        $weblog_favorite_data = json_decode($weblog_cookie_data, true);

        return view('favorite', [
            'product_favorite_data' => $product_favorite_data,
            'weblog_favorite_data' => $weblog_favorite_data
        ]);
    }

    public function add_to_favorite_product($pid)
    {
        //https://www.fundaofwebit.com/post/how-to-make-shopping-cart-using-cookie-in-laravel-with-ajax-request
        if (Cookie::get('favorite_product_cart')) {
            $cookie_data = stripslashes(Cookie::get('favorite_product_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $pid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            return back()->with('status', '!این محصول قبلا به لیست علاقه مندی های شما اضافه شده');
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
                Cookie::queue(Cookie::make('favorite_product_cart', $item_data, $minutes));
                return back()->with('status', '!محصول مورد نظر با موفقیت به لیست علاقه مندی های شما اضافه شد');
            }
        }
    }

    public function add_product_from_favorite_to_basket($pid)
    {
        if (Cookie::get('shopping_cart')) {
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $pid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            return back()->with('status', 'این محصول قبلا به سبد خرید شما اضافه شده!');
        } else {
            $this->delete_product_from_favorite_cart($pid);

            $b = new BasketController();
            $b->add_to_basket($pid);

            return back()->with('status', 'محصول مورد نظر با موفقیت از لیست علاقه مندی ها به سبد خرید اضافه شد!');
        }
    }

    public function delete_product_from_favorite_cart($pid)
    {
        $cookie_data = stripslashes(Cookie::get('favorite_product_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $pid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $pid) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('favorite_product_cart', $item_data, $minutes));
                    return back()->with('status', 'محصول مورد نظر با موفقیت از لیست علاقه مندی های شما حذف شد!');
                }
            }
        }
    }

    public function add_to_favorite_weblog($wid)
    {
        if (Cookie::get('favorite_weblog_cart')) {
            $cookie_data = stripslashes(Cookie::get('favorite_weblog_cart'));
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $wid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            return back()->with('status', 'این مطلب قبلا به لیست علاقه مندی های شما اضافه شده!');
        } else {
            $weblog = Weblog::find($wid);
            $weblog_title = $weblog->title;

            if ($weblog) {
                $item_array = array(
                    'item_id' => $wid,
                    'item_title' => $weblog_title,
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                $minutes = 60;
                Cookie::queue(Cookie::make('favorite_weblog_cart', $item_data, $minutes));
                return back()->with('status', 'مطلب مورد نظر با موفقیت به لیست علاقه مندی های شما اضافه شد!');
            }
        }
    }

    public function delete_weblog_from_favorite_cart($wid)
    {
        $cookie_data = stripslashes(Cookie::get('favorite_weblog_cart'));
        $cart_data = json_decode($cookie_data, true);

        $item_id_list = array_column($cart_data, 'item_id');
        $prod_id_is_there = $wid;

        if (in_array($prod_id_is_there, $item_id_list)) {
            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $wid) {
                    unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data, JSON_UNESCAPED_UNICODE);
                    $minutes = 60;
                    Cookie::queue(Cookie::make('favorite_weblog_cart', $item_data, $minutes));
                    return back()->with('status', 'مطلب مورد نظر با موفقیت از لیست علاقه مندی های شما حذف شد!');
                }
            }
        }
    }
}
