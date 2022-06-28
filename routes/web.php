<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\WishlistController;




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
Route::get('/', [FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category'] );
Route::get('view_category/{slug}',[FrontendController::class,'viewcategory']);
Route::get('view_category/{cate_slug}/{prod_slug}',[FrontendController::class,'productview']);

Auth::routes();

Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::get('load-wishlist-data',[WishlistController::class,'wishlistcount']);



Route::post('add-to-cart',[CartController::class,'addproduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::post('update-cart',[CartController::class,'updatecart']);

Route::post('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'remove']);



Route::middleware(['auth'])->group (function () {
  Route::get('cart',[CartController::class,'viewcart']);
  Route::get('checkout',[CheckoutController::class,'index']);
  Route::post('place-order',[CheckoutController::class,'placeorder']);
  Route::get('my-orders',[UserController::class,'index']);
  Route::get('view-order/{id}',[UserController::class,'view']);

  Route::get('wishlist',[WishlistController::class,'index']);
 
  // Route::get('view-order',[UserController::class,'view']);

});


 Route::middleware(['auth','isAdmin'])->group (function () {

   Route::get('/dashboard','App\Http\Controllers\FrontendController@index');
   Route::get('categories','App\Http\Controllers\CategoryController@index');
   Route::get('add-categories','App\Http\Controllers\CategoryController@add');
   Route::post('insert-category','App\Http\Controllers\CategoryController@insert');
   Route::get('edit-prod/{id}', [CategoryController::class,'edit']);
   Route::put('update-category/{id}', [CategoryController::class,'update']);
   Route::get('delete-category/{id}', [CategoryController::class,'destroy']);

   Route::get('products', [ProductController::class,'index']);
   Route::get('add-products', [ProductController::class,'add']);
   Route::post('insert-product', [ProductController::class,'insert']);
   Route::get('edit-product/{id}', [ProductController::class,'edit']);
   Route::put('update-product/{id}', [ProductController::class,'update']);
   Route::get('delete-product/{id}', [ProductController::class,'destroy']);

   
   Route::get('orders',[OrderController::class,'index']);
   Route::get('admin/view-order/{id}',[OrderController::class,'view']);
   Route::put('update-order/{id}',[OrderController::class,'updateorder']);
   Route::get('order-history',[OrderController::class,'orderhistory']);

   Route::get('users',[DashboardController::class,'users'] );
   Route::get('view-user/{id}',[DashboardController::class,'viewuser']);


   
   
 

});