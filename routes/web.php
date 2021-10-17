<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\sitepropertyController;
use App\Http\Controllers\useraccountController;
use App\Http\Controllers\userprofileController;
use App\Http\Controllers\WeblogController;
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
Route::post('/product-detail/add', [ProductController::class, 'store'])->name('add-product');
Route::post('/product-detail/edit/{pid}', [ProductController::class, 'edit']);
Route::get('/get-product/{pid}', [ProductController::class, 'get_product_by_id']);
Route::get('/delete-product/{pid}', [ProductController::class, 'delete'])->name('delete-product');


Route::get('/weblog-detail/{wid}', [WeblogController::class, 'indexd'])->name('weblog-detail');
Route::get('/weblogs', [WeblogController::class, 'indexs'])->name('weblogs');
Route::get('/weblogs/{wid}', [WeblogController::class, 'indexss'])->name('weblogss');
Route::post('/weblog-detail/add', [WeblogController::class, 'store'])->name('add-weblog');
Route::post('/weblog-detail/edit/{wid}', [WeblogController::class, 'edit']);
Route::get('/get-weblog/{wid}', [WeblogController::class, 'get_weblog_by_id']);
Route::get('/delete-weblog/{wid}', [WeblogController::class, 'delete'])->name('delete-weblog');



Route::get('/basket', function () {
    return view('basket');
});

Route::get('/favorite', function () {
    return view('favorite');
});


Route::post('/change-site-gallery', [sitepropertyController::class, 'change_gallery'])->name('change-site-gallery');
Route::post('/change-site-topad', [sitepropertyController::class, 'change_topad'])->name('change-site-topad');
Route::post('/change-site-downad', [sitepropertyController::class, 'change_downad'])->name('change-site-downad');
Route::post('/change-site-fourad', [sitepropertyController::class, 'change_fourad'])->name('change-site-fourad');
