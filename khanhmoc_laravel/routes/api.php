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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('products', ProductController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('admins', AdminController::class);