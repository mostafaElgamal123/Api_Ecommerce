<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{CategoryApiController,ProductApiController,AuthController,CartController,OrderController};
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
Route::get('/categories/{category}/products',[CategoryApiController::class,'ShowCategoriesProducts']);
Route::resource('/products',ProductApiController::class);
Route::get('/searchproductnames',[ProductApiController::class,'SearchProductName']);
Route::get('/productsaccordingcategory/{cate_id}',[ProductApiController::class,'ProductsAccordingCategory']);
Route::get('/filterproducts',[ProductApiController::class,'FilterProducts']);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/carts',[CartController::class,'index']);
    Route::post('/addtocart/{product}',[CartController::class,'AddProductToCart']);
    Route::put('/updateproductincart/{cart}',[CartController::class,'UpdateProductInCart']);
    Route::DELETE('/deletefromcart/{cart}',[CartController::class,'DeleteFromCart']);
    Route::DELETE('/deletefromcartall',[CartController::class,'DeleteFromCartAll']);
    Route::post('/order',[OrderController::class,'Order']);
    Route::get('/getorderdata',[OrderController::class,'GetOrderData']);
});

Route::group(['middleware' => 'api','namespace' => 'App\Http\Controllers','prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class,'register']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
});

