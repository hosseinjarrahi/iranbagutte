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

Route::get('/', 'HomeController@home')->name('home');

Route::get('/benefits', 'HomeController@benefits');

Route::get('/contact-us', 'HomeController@contactUs');

Route::get('/food/{food}/{alert?}', 'HomeController@showFood');

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});

Route::get('/restaurants', 'HomeController@showRestaurants');

Route::get('/test', function () {
    dd(\App\Banner::textBanner()->get());
});

Route::get('/games-page', 'HomeController@gamesPage');

Route::get('/game/{game}', 'HomeController@game');

Route::post('check-buycode', 'HomeController@checkBuycode');

Route::get('/login', 'UserController@loginPage')->name('login');

Route::post('/login', 'UserController@login');

Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/order', 'HomeController@order');

Route::group(['prefix' => 'manager','middleware' => 'auth'], function () {

    Route::get("/", "ManagerController@show");
    Route::get('home', "ManagerController@home");

    Route::get('advertise', 'AdvertiseController@show');
    Route::get('advertise/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise', 'AdvertiseController@add');

    Route::get('advertise/zirnevis', 'AdvertiseController@zirnevisManage');
    Route::get('advertise/zirnevis/delete/{id}', 'AdvertiseController@zirnevisDelete');
    Route::put('advertise/zirnevis', 'AdvertiseController@zirnevisAdd');

    Route::get('advertise/dynamic', 'AdvertiseController@dynamicManage');
    Route::get('advertise/dynamic/delete/{id}', 'AdvertiseController@dynamicDelete');
    Route::put('advertise/dynamic', 'AdvertiseController@dynamicAdd');

});

//endadvertise