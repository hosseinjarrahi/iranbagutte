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

Route::group(['prefix' => 'restaurant'],function(){
	Route::get('{restaurant}','HomeController@showRestaurant');
});

Route::get('/test' , function(){
//	dd(\App\Category::truncate());
});