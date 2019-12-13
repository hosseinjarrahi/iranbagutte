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

Route::get('/', 'HomeController@home');

Route::get('/benefits', 'HomeController@benefits');

Route::get('/contact-us', 'HomeController@contactUs');

Route::get('/food/{food}/{alert?}', 'HomeController@showFood');

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});

Route::get('/test', function () {
    dd(\App\Banner::textBanner()->get());
});

Route::get('/games-page', 'HomeController@gamesPage');
Route::get('/game/{game}', 'HomeController@game');
Route::post('check-buycode', 'HomeController@checkBuycode');

// manager login
    Route::group(['prefix' => 'manager'], function () {
    Route::get("/", "ManagerController@show");
    Route::get('home', "ManagerController@home");
});
//end manager login

//advertise

    Route::get('manager/advertise','AdvertiseController@show');
    Route::get('manager/advertise/delete/{id}','AdvertiseController@delete');
    Route::put('manager/advertise','AdvertiseController@add');

    Route::get('manager/advertise/zirnevis','AdvertiseController@zirnevisManage');
    Route::get('manager/advertise/zirnevis/delete/{id}','AdvertiseController@zirnevisDelete');
    Route::put('manager/advertise/zirnevis','AdvertiseController@zirnevisAdd');

    Route::get('manager/advertise/dynamic','AdvertiseController@dynamicManage');
    Route::get('manager/advertise/dynamic/delete/{id}','AdvertiseController@dynamicDelete');
    Route::put('manager/advertise/dynamic','AdvertiseController@dynamicAdd');

//end advertise
// category
Route::get("manager/category" , "CategoryController@show");
Route::put("manager/category" , "CategoryController@add");
Route::patch("manager/category" , "CategoryController@update");
Route::get("manager/category/delete/{id}" , "CategoryController@mainDelete");
Route::get("manager/category/sub/delete/{id}" , "CategoryController@subDelete");
