<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\sitepropertyController;
use App\Http\Controllers\useraccountController;
use App\Http\Controllers\userprofileController;
use App\Http\Controllers\WeblogController;
use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Support\Facades\Route;
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

Route::get('/',  [indexController::class, 'index'])->name('index-page');

Route::get('/manager-panel', [managerController::class, 'index'])->name('manager-panel');

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/user-account', [useraccountController::class, 'index'])->name('user-account');
Route::post('/user-account/register', [useraccountController::class, 'register'])->name('register');
Route::post('/user-account/login', [useraccountController::class, 'login'])->name('login');
Route::post('/user-account/reset-pass', [useraccountController::class, 'reset_pass'])->name('reset-pass');
Route::post('/user-account/logout', [useraccountController::class, 'logout'])->name('logout');
Route::get('/change-user-active/{uid}', [useraccountController::class, 'change_user_active'])->name('change-user-active');


Route::get('/user-profile', [userprofileController::class, 'index'])->name('user-profile')->middleware('auth');
Route::post('/user-profile/edit-details', [userprofileController::class, 'edit_details'])->name('edit-user-details')
->middleware('auth');
Route::post('/user-profile/edit-pass', [userprofileController::class, 'edit_pass'])->name('edit-user-pass')
->middleware('auth');

Route::get('/contact-us', [MessageController::class, 'index'])->name('contact-us');
Route::post('/contact-us/send-message', [MessageController::class, 'store'])->name('send-message');


Route::get('/product-detail/{pid}', [ProductController::class, 'indexd'])->name('product-detail');
Route::get('/products/{gk}', [ProductController::class, 'indexs'])->name('products');
Route::get('/products/{gk}/{num}', [ProductController::class, 'products_filter'])->name('products-filter');
Route::post('/product-detail/add', [ProductController::class, 'store'])->name('add-product');
Route::post('/product-detail/edit/{pid}', [ProductController::class, 'edit']);
Route::get('/get-product/{pid}', [ProductController::class, 'get_product_by_id']);
Route::get('/delete-product/{pid}', [ProductController::class, 'delete'])->name('delete-product');


Route::post('/submit-product-comment/{pid}', [CommentController::class, 'store_product_comment'])->name('store-product-comment');
Route::post('/submit-weblog-comment/{pid}', [CommentController::class, 'store_weblog_comment'])->name('store-weblog-comment');
Route::get('/active-comment/{cid}', [CommentController::class, 'active_comment'])->name('active_comment');
Route::get('/delete-comment/{cid}', [CommentController::class, 'delete_comment'])->name('delete_comment');
Route::get('/get-comment/{cid}', [CommentController::class, 'get_comment'])->name('get_comment');
Route::post('/affect-on-comment/{cid}', [CommentController::class, 'edit_comment_and_submit_answer'])->name('edit_comment_and_submit_answer');


Route::get('/weblog-detail/{wid}', [WeblogController::class, 'indexd'])->name('weblog-detail');
Route::get('/weblogs', [WeblogController::class, 'indexs'])->name('weblogs');
Route::get('/weblogs/{wid}', [WeblogController::class, 'indexss'])->name('weblogss');
Route::post('/weblog-detail/add', [WeblogController::class, 'store'])->name('add-weblog');
Route::post('/weblog-detail/edit/{wid}', [WeblogController::class, 'edit']);
Route::get('/get-weblog/{wid}', [WeblogController::class, 'get_weblog_by_id']);
Route::get('/delete-weblog/{wid}', [WeblogController::class, 'delete'])->name('delete-weblog');


Route::post('/change-site-gallery', [sitepropertyController::class, 'change_gallery'])->name('change-site-gallery');
Route::post('/change-site-topad', [sitepropertyController::class, 'change_topad'])->name('change-site-topad');
Route::post('/change-site-downad', [sitepropertyController::class, 'change_downad'])->name('change-site-downad');
Route::post('/change-site-fourad', [sitepropertyController::class, 'change_fourad'])->name('change-site-fourad');


Route::get('/basket', [BasketController::class, 'index']);
Route::get('/basket/add/{pid}', [BasketController::class, 'add_to_basket'])->name('add_to_basket');
Route::get('/basket/delete/{pid}', [BasketController::class, 'delete_from_basket'])->name('delete_from_basket');


Route::get('/favorite', [FavoriteController::class, 'index']);
Route::get('/favorite/product/add/{pid}', [FavoriteController::class, 'add_to_favorite_product'])->name('add_to_favorite_product');
Route::get('/favorite/product/delete/{pid}', [FavoriteController::class, 'delete_product_from_favorite_cart'])->name('delete_product_from_favorite_cart');
Route::get('/favorite/product/add-to-basket/{pid}', [FavoriteController::class, 'add_product_from_favorite_to_basket'])->name('add_product_from_favorite_to_basket');

Route::get('/favorite/weblog/add/{wid}', [FavoriteController::class, 'add_to_favorite_weblog'])->name('add_to_favorite_weblog');
Route::get('/favorite/weblog/delete/{wid}', [FavoriteController::class, 'delete_weblog_from_favorite_cart'])->name('delete_weblog_from_favorite_cart');

Route::post('/basket/order/first-step', [OrderController::class, 'first_step'])->name('first_step');
Route::post('/basket/order/buy/{price}', [OrderController::class, 'sss']);