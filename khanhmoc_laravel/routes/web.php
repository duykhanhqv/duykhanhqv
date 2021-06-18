<?php

use App\Http\Controllers\frontend\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('f.home');

Route::get('/register', [HomeController::class, 'formLoginRegister'])->name('f.formLoginRegister');
Route::post('/registerpost', [HomeController::class, 'registerpost'])->name('f.registerPost');
Route::post('/loginpost', [HomeController::class, 'loginPost'])->name('f.loginPost');
Route::get('/list_product={category_id}', [HomeController::class, 'listtingProducts'])->name('f.listProduct');
Route::get('/detail_product={product_id}', [ProductController::class, 'detailProduct'])->name('f.detailProduct');
Route::get('/cart', [CartController::class, 'getCart'])->name('f.cart');
Route::get('/add_product_to_cart={product_id}', [CartController::class, 'addProductToCart'])->name('f.addProductToCart');


// Route::get('/cart', [CartController::class, 'cart'])->name('f.cart');
