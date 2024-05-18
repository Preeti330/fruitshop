<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

// Route::get('/shop/{id?}',[ShopController::class,'index']);
Route::get('/shop/{id?}', [ShopController::class, 'index']);
Route::get('/getcatgories',[ShopController::class,'getcatgories']);

// web.php
Route::get('/errormsg', function () {
    return view('frontend/errormsg');
})->name('errormsg');


Route::post('/savecart', [ShopController::class, 'saveCart']);

Route::get('cart/{user_id}', [ShopController::class, 'cart']);

Route::post('checkout', [ShopController::class, 'checkout']);

Route::get('checkoutpage/{user_id}',[ShopController::class,'checkoutpage']);


