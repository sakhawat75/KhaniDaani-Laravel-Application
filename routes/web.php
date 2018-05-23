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

Route::get('profile', 'ProfileController@index')->name('profile');

Route::get('profile_setting', 'ProfileController@profile_setting')->name('profile_setting');

Route::get('create_dish', 'ProfileController@create_dish')->name('create_dish');

Route::get('single_dish', 'ProfileController@single_dish')->name('single_dish');

Route::get('recover-pass', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recover-pass');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/single-dish', 'ProfileController@single_dish');
