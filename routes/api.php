<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{CategoryApiController,ProductApiController};
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/categories',CategoryApiController::class);
Route::resource('/products',ProductApiController::class);
Route::get('/searchproductnames',[ProductApiController::class,'SearchProductName']);
Route::get('/productsaccordingcategory/{cate_id}',[ProductApiController::class,'ProductsAccordingCategory']);
Route::get('/filterproducts',[ProductApiController::class,'FilterProducts']);
