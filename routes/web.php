<?php

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

Route::get('/product', function () {
    return view('product');
});
Route::get('/store', function () {
    return view('store');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/blank', function () {
    return view('blank');
});
Route::get('/accessories', function () {
    return view('pages.accessories');
});
Route::get('/laptops', function () {
    return view('pages.laptops');
});

Route::get('/cameras', function () {
    return view('pages.camera');
});
Route::get('/smartphones', function () {
    return view('pages.smartphones');
});
Route::get('/hot-deals', function () {
    return view('pages.hot-deals');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('welcome');
  
Route::get('auth/social', 'Auth\LoginController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\LoginController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');


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

Route::get('/ ', 'CartsController@index');

Route::get('cart', 'CartsController@cart');

Route::get('add-to-cart/{id}', 'CartsController@addToCart');
Route::patch('update-cart', 'CartsController@update');

Route::delete('remove-from-cart', 'CartsController@remove');


 
 
Route::resource('product', 'ProductsControllers');
 
Route::get('photos/json', 'PhotosControllers@images')->name('images');
Route::post('photos', 'PhotosControllers@store');
Route::get('mgs', 'PhotosControllers@creat')->name('mgs');

Route::post('products/like', 'ProductsControllers@productLike')->name('p_like');
// dashboard admin routes

    Route::resource('admin','dashboardAdminHomeController');
    Route::resource('products','dashboardAdminProductsController');
 