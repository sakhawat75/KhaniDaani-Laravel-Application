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

Route::get('/', 'ViewController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::get('/profile/create', 'ProfileController@create')->name('profile.create');

Route::post('/profile', 'ProfileController@store')->name( 'profile.store');

Route::get( '/profile/chefdishes', 'ProfileController@chefdishes')->name('profile.chefdishes');

Route::get( '/profile/chefdelivery', 'ProfileController@chefdelivery')->name('profile.chefdelivery');

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');

Route::put( '/profile/{profile}', 'ProfileController@update')->name('profile.update');


Route::get( '/order/selectdsp', 'OrderController@selectdsp')->name( 'order.selectdsp');

Route::get( '/order/confirm', 'OrderController@confirm')->name( 'order.confirm');

Route::get( '/order/status', 'OrderController@status')->name( 'order.status');

Route::get( '/search/livedish', 'RestApiController@livedish')->name( 'search.livedish');

Route::get( '/delivery/AddService', 'DeliveryServiceController@create')->name( 'delivery.create');
Route::post( '/delivery/Add_Service', 'DeliveryServiceController@AddService')->name( 'delivery.AddService');

Auth::routes();

Route::get( '/dishes/manage', 'DishesController@manage')->name( 'dishes.manage');
Route::get( '/dishes/editdish', 'DishesController@editdish')->name( 'dishes.editdish');
Route::resource( '/dishes', 'DishesController');

Route::get('/ajax-subcat', 'RestApiController@jsonSubCat');
Route::get('/ajax-areas', 'RestApiController@jsonAreas');

Route::get('recover-pass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recover-pass');

Route::get('/home', 'HomeController@index');

