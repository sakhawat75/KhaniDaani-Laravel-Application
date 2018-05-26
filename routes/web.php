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

Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show');

Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('profile.edit');

Route::put( '/profile/{profile}', 'ProfileController@update')->name('profile.update');


Auth::routes();

Route::get( '/dishes/manage', 'DishesController@manage')->name( 'dishes.manage');
Route::resource( '/dishes', 'DishesController');


Route::get('recover-pass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recover-pass');

Route::get('/home', 'HomeController@index');

