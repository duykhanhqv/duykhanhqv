<?php

use App\Http\Controllers\frontend\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\system\AdminCategoryController;
use App\Http\Controllers\system\AdminDepartmentController;
use App\Http\Controllers\system\AdminOrderController;
use App\Http\Controllers\system\AdminProductController;
use App\Http\Controllers\system\AdminRoleController;
use App\Http\Controllers\system\SystemController;
use App\Models\Product;

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

Route::get('/q', function () {
    return view('welcome');
});

Route::group(['middleware' => 'checklogin'], function () {
    Route::get('/list_product={category_id}', [ProductController::class, 'listtingProducts'])->name('f.listProduct');
    Route::get('/detail_product={product_id}', [ProductController::class, 'detailProduct'])->name('f.detailProduct');
    Route::get('/cart', [CartController::class, 'getCart'])->name('f.cart');
    Route::get('/add_product_to_cart={product_id}', [CartController::class, 'addProductToCart'])->name('f.addProductToCart');
    Route::get('/update_qty_up={product_id}', [CartController::class, 'updateQtyUp'])->name('f.updateQtyUp');
    Route::get('/update_qty_down={product_id}', [CartController::class, 'updateQtyDown'])->name('f.updateQtyDown');
    Route::post('/update', [CartController::class, 'updateCart'])->name('f.updateCart');
    Route::get('/checkout', [OrderController::class, 'getCheckOut'])->name('f.checkOut');
    Route::post('/create_bill', [OrderController::class, 'createBill'])->name('f.createBill');
    Route::post('/add_many_products', [CartController::class, 'addManyProductsToCart'])->name('f.addManyProductsToCart');
    Route::post('/add_to_cart_ajax', [CartController::class, 'addProductToCartAjax'])->name('f.addProductToCartAjax');
    // Route::get('/add_to_cart_ajax={product_id}', [CartController::class, 'addProductToCartAjax'])->name('f.addProductToCartAjax');
    Route::get('/delete_product={product_id}', [CartController::class, 'removeProductInCart'])->name('f.remoteProductInCart');
    Route::post('/delete_product_in_cart_ajax', [CartController::class, 'removeProductInCartAjax'])->name('f.removeProductInCartAjax');
    Route::post('/up_product_in_cart_ajax', [CartController::class, 'upProductInCartAjax'])->name('f.upProductInCartAjax');
    Route::post('/down_product_in_cart_ajax', [CartController::class, 'downProductInCartAjax'])->name('f.downProductInCartAjax');
    Route::post('/listting_product_ajax', [ProductController::class, 'listtingProductsAjax'])->name('f.listtingProductsAjax');
    Route::post('/products_list_ajax', [ProductController::class, 'productsListAjax'])->name('f.productsListAjax');
    Route::post('/products_gird_ajax', [ProductController::class, 'productsGirdAjax'])->name('f.productsGirdAjax');
    Route::post('/products_quick_view', [ProductController::class, 'productsQuickView'])->name('f.productsQuickView');
    Route::get('/home', [HomeController::class, 'home'])->name('f.home');
});


Route::post('/loginpost', [HomeController::class, 'postLogin'])->name('f.postLogin');
Route::get('/login', [HomeController::class, 'formLoginRegister'])->name('f.formLoginRegister');
Route::post('/registerpost', [HomeController::class, 'postRegister'])->name('f.postRegister');
Route::get('/loginadmin', [SystemController::class, 'login'])->name('s.login');
Route::post('/loginadminpost', [SystemController::class, 'postLogin'])->name('s.loginpost');
Route::get('/registeradmin', [SystemController::class, 'register'])->name('s.register');
Route::get('/logout', [SystemController::class, 'logout'])->name('s.logout');
Route::post('/registeradminpost', [SystemController::class, 'postRegister'])->name('s.registerpost');
Route::get('/changepassword', [SystemController::class, 'changePassword'])->name('s.changePassword');
Route::post('/changepassword', [SystemController::class, 'postChangePassword'])->name('s.postChangePassword');
Route::get('/test', function () {
    return view('admin.test');
});

Route::group(['middleware' => 'checkloginadmin'], function () {
    Route::group(['middleware' => 'roles_admin'], function () {
        Route::get('/role', [AdminRoleController::class, 'list'])->name('s.role');
        Route::post('/role', [AdminRoleController::class, 'update'])->name('s.updateRole');
    });
    Route::group(['middleware' => 'roles_product'], function () {
        Route::resource('/products', AdminProductController::class);
        Route::resource('/categorys', AdminCategoryController::class);
        Route::resource('/departments', AdminDepartmentController::class);
    });
    Route::group(['middleware' => 'roles_order'], function () {
        Route::resource('/orders', AdminOrderController::class);
        Route::get('/orders_new', [AdminOrderController::class, 'orderNew'])->name('orders.new');
        Route::get('/orders_confirm', [AdminOrderController::class, 'orderConfirm'])->name('orders.confirm');
        Route::get('/orders_delivering', [AdminOrderController::class, 'orderDelivering'])->name('orders.delivering');
        Route::get('/orders_delived', [AdminOrderController::class, 'orderDelived'])->name('orders.delived');
        Route::get('/orders_cancel', [AdminOrderController::class, 'orderCancel'])->name('orders.cancel');
    });

    Route::get('/admin', [SystemController::class, 'dashboard'])->name('s.admin');
});
