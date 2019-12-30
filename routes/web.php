<?php

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

// User routes
Auth::routes();
Route::any('user/{id}/edit', 'UserController@edit')->name('edit');
Route::get('user/{id}', 'UserController@show')->name('show');
Route::get('bestelgeschiedenis', 'UserController@index')->name('bestelgeschiedenis');

// Restaurant routes
Route::resource('restaurants', 'RestaurantController');
Route::resource('restaurants/{restaurant_id}/consumables', 'ConsumableController');

// Front page route
Route::get('/', 'RestaurantController@index')->name('welcome');

// ShoppingCart
Route::get('cart/shoppingcart', 'CartController@getCart')->name('shoppingcart');
Route::get('/add-to-cart/add/{id}', 'CartController@addToCart')->name('addToCart');
Route::get('/add-to-cart/reduce/{id}', 'CartController@getReduceByOne')->name('reduce');
Route::get('/add-to-cart/remove/{id}', 'CartController@getRemoveItem')->name('remove');
Route::get('cart/checkout', [
    'uses' => 'cartController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::post('cart/checkout', [
    'uses' => 'CartController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('admin/index', function() {
		return view('admin/index');
	})->name('adminpanel');
});
