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

Route::get('/' , 'HomeController@home');

Route::get('/benefits' , 'HomeController@benefits');

Route::get('/contact-us' , 'HomeController@contactUs');

Route::get('/food/{food}/{alert?}','HomeController@showFood');

Route::group(['prefix' => 'restaurant'],function(){
	Route::get('{restaurant}','HomeController@showRestaurant');
	Route::post('down','HomeController@ajax');
});

Route::get('/test' , function () {
	dd(\App\Banner::textBanner()->get());
});

Route::get('/games-page','HomeController@gamesPage');

Route::get('/game/{game}','HomeController@game');

Route::post('check-buycode' , 'HomeController@checkBuycode');
