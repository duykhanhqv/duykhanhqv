<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\ProductController;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('admins', AdminController::class);
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/logout', [AdminController::class, 'logout']);
    Route::post('/refresh', [AdminController::class, 'refresh']);
    Route::get('/user-profile', [AdminController::class, 'userProfile']);
    Route::get('products_top_view/{limit}', [ProductController::class, 'topView']);
    Route::get('products_top_price', [ProductController::class, 'topPrice']);
    Route::post('products_between', [ProductController::class, 'priceBetween']);

    Route::resource('products', ProductController::class);
    Route::resource('departments', DepartmentController::class);
});