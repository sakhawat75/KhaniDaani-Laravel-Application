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

Route::get('/messages/all', 'NotificationsController@messages')->name('messages.all');

Route::get('/messages/compose', 'NotificationsController@compose')->name('messages.compose');

Route::get('/notifications/all', 'NotificationsController@notifications')->name('notifications.all');
Route::get('/notifications/mark_as_read', 'NotificationsController@mark_as_read')->name('notifications.mark_as_read');

Route::get('/', 'ViewController@index')->name('home');

Route::get('/profile/cashout', 'ProfileController@cashout')->name('profile.cashout');

Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::get('/profile/create', 'ProfileController@create')->name('profile.create');

Route::post('/profile', 'ProfileController@store')->name( 'profile.store');

Route::get( '/profile/chefdishes', 'ProfileController@chefdishes')->name('profile.chefdishes');

Route::get( '/profile/{user}/chefdelivery', 'ProfileController@chefdelivery')->name('profile.chefdelivery');

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');

Route::put( '/profile/{profile}', 'ProfileController@update')->name('profile.update');


Route::get( '/search/livedish', 'SearchController@livedish')->name( 'search.livedish');
Route::post( '/search/livedish', 'SearchController@search_livedish')->name( 'search.livedish');

Route::get( '/delivery/AddService', 'DeliveryServiceController@create')->name( 'delivery.create');
Route::post( '/delivery/AddService', 'DeliveryServiceController@AddService')->name( 'delivery.AddService');

Auth::routes();

Route::get( '/dishes/purchase', 'DishesController@purchase')->name( 'dishes.purchase');
Route::get( '/dishes/manage', 'DishesController@manage')->name( 'dishes.manage');
Route::get( '/dishes/editdish', 'DishesController@editdish')->name( 'dishes.editdish');
Route::resource( '/dishes', 'DishesController');

Route::get('/ajax-subcat', 'RestApiController@jsonSubCat');
Route::get('/api/categories', 'RestApiController@jsonCategories');
Route::get('/ajax-areas', 'RestApiController@jsonAreas');
Route::get('/api/search-dish', 'RestApiController@jsonSearchDish')->name( 'api.search.dish');
Route::get('/api/order/update', 'RestApiController@orderUpdate')->name( 'api.order.update');

Route::get('/rating/{order}', 'RatingController@store')->name( 'rating.store');

Route::get('recover-pass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recover-pass');

Route::get('/home', 'HomeController@index');


// Auth Required Routes
Route::group(['middleware' => 'auth'], function (){
	// Order Routes
	Route::get( '/order/selectdsp/{dish}', 'OrderController@selectdsp')->name( 'order.selectdsp');
	Route::get( '/order/confirm/{dsp}/{dish}', 'OrderController@confirm')->name( 'order.confirm');
	Route::get( '/order/store', 'OrderController@storeOrder')->name( 'order.store');
	Route::get( '/order/status/{order}', 'OrderController@status')->name( 'order.status');
	Route::get('api/all_notifications', 'RestApiController@allNotification')->name( 'api.all_notifications');
});

Route::get('/tz', function(){
	dd(date_default_timezone_get());
});