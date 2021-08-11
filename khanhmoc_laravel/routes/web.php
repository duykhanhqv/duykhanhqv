<?php

use App\Http\Controllers\frontend\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\LocalizationController;
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




Route::group(['middleware' => 'language'], function () {
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
        Route::post('/products_detail_ajax', [ProductController::class, 'productsDetailAjax'])->name('f.productsDetailAjax');
        Route::post('/home_ajax', [HomeController::class, 'homeAjax'])->name('f.homeAjax');
        Route::post('/cart_ajax', [CartController::class, 'getCartAjax'])->name('f.getCartAjax');
        Route::post('/rating', [ProductController::class, 'postRatingReview'])->name('f.postRatingReview');
        Route::post('/search', [ProductController::class, 'searchProduct'])->name('f.searchProduct');
        Route::get('/searchAutoComplement', [ProductController::class, 'searchAutoComplement'])->name('f.searchAutoComplement');
        Route::get('/home', [HomeController::class, 'home'])->name('f.home');
    });
    Route::group(['middleware' => 'checkloginadmin'], function () {
        Route::group(['middleware' => 'roles_admin'], function () {
            Route::get('/role', [AdminRoleController::class, 'list'])->name('s.role');
            Route::post('/role', [AdminRoleController::class, 'update'])->name('s.updateRole');
            Route::get('/role/edit/{id}', [AdminRoleController::class, 'edit'])->name('s.editRole');
            Route::put('/role/{id}', [AdminRoleController::class, 'updateInfoRole'])->name('s.updateInfoRole');
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
            // Route::post('/order_change', [AdminOrderController::class, 'Change'])->name('order.change');
            Route::post('/order_remove_product', [AdminOrderController::class, 'remove_product'])->name('order.remove_product');
        });
        Route::get('/changepassword', [SystemController::class, 'changePassword'])->name('s.changePassword');

        Route::get('/admin', [SystemController::class, 'dashboard'])->name('s.admin');
    });
    Route::get('/change-language/{language}', [HomeController::class, 'changeLanguage'])->name('f.changeLanguage');
    Route::get('/login', [HomeController::class, 'formLoginRegister'])->name('f.formLoginRegister');
    Route::get('/lang', [HomeController::class, "lang"]);
    Route::get('/testajax', [ProductController::class, 'testajax'])->name('f.test');
    Route::post('/loginpost', [HomeController::class, 'postLogin'])->name('f.postLogin');
    Route::post('/registerpost', [HomeController::class, 'postRegister'])->name('f.postRegister');
    Route::get('/logout', [HomeController::class, 'logout'])->name('f.logout');

    Route::get('/loginadmin', [SystemController::class, 'login'])->name('s.login');
    Route::post('/loginadminpost', [SystemController::class, 'postLogin'])->name('s.loginpost');
    Route::get('/registeradmin', [SystemController::class, 'register'])->name('s.register');
    Route::get('/adminlogout', [SystemController::class, 'logout'])->name('s.logout');
    Route::post('/registeradminpost', [SystemController::class, 'postRegister'])->name('s.registerpost');
    Route::get('/changepassword', [SystemController::class, 'changePassword'])->name('s.changePassword');
    Route::post('/changepassword', [SystemController::class, 'postChangePassword'])->name('s.postChangePassword');
    Route::get('/test', function () {
        return view('admin.test');
    });
});