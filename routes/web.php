<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::resource('ad-types', 'AdTypesController');
Route::resource('customers', 'CustomersController');
Route::resource('pricing-rules', 'PricingRulesController');
Route::get('checkout', 'CheckoutsController@create')->name('checkout');
Route::post('checkout', 'CheckoutsController@store')->name('checkout');

Route::get('orders', 'OrdersController@index')->name('orders');
Route::get('/', 'OrdersController@index')->name('orders');
Route::delete('orders/{order}', 'OrdersController@destroy')->name('orders');

