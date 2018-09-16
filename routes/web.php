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

Route::get( '/pickerspoint/addpp', 'PickersPointController@addpp')->name( 'pickerspoint.addpp');
Route::resource('pickerspoint', 'PickersPointController');


Route::get('/messages/compose', 'NotificationsController@compose')->name('messages.compose');

Route::get('/notifications/all', 'NotificationsController@notifications')->name('notifications.all');
Route::get('/notifications/mark_as_read', 'NotificationsController@mark_as_read')->name('notifications.mark_as_read');

Route::get('/', 'ViewController@index')->name('home');

Route::get('/profile/pickerspoint/{profile}', 'ProfileController@pickerspoint')->name('profile.pickerspoint');

Route::get('/profile/cashout', 'ProfileController@cashout')->name('profile.cashout');

Route::get('/profile/add_balance', 'ProfileController@add_balance')->name('profile.add_balance');

Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::get('/profile/create', 'ProfileController@create')->name('profile.create');

Route::post('/profile', 'ProfileController@store')->name( 'profile.store');

Route::get( '/profile/chefdishes/{profile}', 'ProfileController@chefdishes')->name('profile.chefdishes');

Route::get( '/profile/{user}/chefdelivery', 'ProfileController@chefdelivery')->name('profile.chefdelivery');

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');

Route::put( '/profile/{profile}', 'ProfileController@update')->name('profile.update');


Route::get( '/search/dsp', 'SearchController@dsp')->name( 'search.dsp');
Route::get( '/search/pp', 'SearchController@pp')->name( 'search.pp');

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
Route::get('/api/search-dsp', 'RestApiController@jsonSearchDsp')->name( 'api.search.dsp');
Route::get('/api/search-pp', 'RestApiController@jsonSearchPP')->name( 'api.search.pp');
Route::get('/api/order/update', 'RestApiController@orderUpdate')->name( 'api.order.update');

Route::get('/rating/{order}', 'RatingController@store')->name( 'rating.store');

Route::get('recover-pass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recover-pass');

Route::get('/home', 'HomeController@index');


// Auth Required Routes
Route::group(['middleware' => 'auth'], function (){
	// Order Routes
	Route::get( '/order/selectdsp/{dish}', 'OrderController@selectdsp')->name( 'order.selectdsp');
	Route::get( '/order/confirm/{dsp}/{dish}', 'OrderController@confirm')->name( 'order.confirm');
	Route::get( '/order/confirm_pp/{pp}/{dish}', 'OrderController@confirm_pp')->name( 'order.confirm_pp');
	Route::get( '/order/store', 'OrderController@storeOrder')->name( 'order.store');
	Route::get( '/order/status/{order}', 'OrderController@status')->name( 'order.status');

	//Notifications
	Route::get('api/all_notifications', 'RestApiController@allNotification')->name( 'api.all_notifications');

	//Meassage
    Route::get('/messages/all', 'NotificationsController@messages')->name('messages.all');
    Route::get( '/messages/getMessages', 'MessageController@getMessages')->name( 'messages.getMessages');
	Route::get( '/messages/getAllMessages', 'MessageController@getAllMessages')->name( 'messages.getAllMessages');
	Route::get( '/messages/getSingleMessages', 'MessageController@getSingleMessages')->name( 'messages.getSingleMessages');
	Route::post( '/messages/store_with_auth', 'MessageController@store_with_auth')->name( 'messages.store_with_auth');
	Route::resource('messages', 'MessageController');

	// Payments
//    Route::post( 'admin/payment/add_balance', 'PaymentController@add_balance')->name( 'admin.payment.add_balance');
    Route::post( '/payment/add_balance', 'PaymentController@add_balance')->name( 'payment.add_balance');
    Route::post( '/payment/withdraw', 'PaymentController@withdraw')->name( 'payment.withdraw');
});



Route::get('command/storage_link', function () {
    $exitCode = Artisan::call('storage:link');
    echo $exitCode;
    //
});

Route::get('command/migrate_fresh', function () {
    $exitCode = Artisan::call('migrate:fresh');
    echo $exitCode;
    //
});

