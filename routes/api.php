<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*Route::group(['middleware' => ['web']], function () {
	Route::get('/all_notifications', 'RestApiController@allNotification')->name( 'api.all_notifications');
});*/


Route::get('/user/{id}/profile_image', 'RestApiController@get_profile_image')->name( 'api.user.profile_image');
