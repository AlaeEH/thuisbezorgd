<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Admin user routes
Route::resource('users', 'UserController');

// Bestel data 
Route::get('users/{id}/besteldata', 'UserController@show')->name('adminBesteldata');
Route::get('users/{user_id}/invoice/{order_id}', 'UserController@invoice')->name('invoice');

// Admin restaurant routes
Route::resource('restaurants', 'RestaurantController');

// Admin consumable routes
Route::resource('restaurants/{restaurant_id}/consumables', 'ConsumableController');