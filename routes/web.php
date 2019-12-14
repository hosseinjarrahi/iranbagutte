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
Route::get('/restaurants', 'HomeController@showRestaurants');

Route::get('/games-page', 'HomeController@gamesPage');
Route::get('/game/{game}', 'HomeController@game');
Route::post('check-buycode', 'HomeController@checkBuycode');

Route::get('/login', 'UserController@loginPage')->name('login');

Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout')->name('logout');

Route::get('/order', 'HomeController@order');

Route::get("/basket" , 'BasketController@show');
Route::get("/add-to-basket/{id}" , 'BasketController@add');
Route::get("/remove-from-basket/{id}" , 'BasketController@remove');
Route::get("/checkout" , 'BasketController@checkout');
Route::get("/reply" , 'BasketController@reply');
Route::get("/status" , 'BasketController@status');


// manager login
Route::group(['prefix' => 'manager','middleware' => 'auth'], function () {
    Route::get("/", "ManagerController@show");
    Route::get('home', "ManagerController@home");

    Route::get('advertise', 'AdvertiseController@show');
    Route::get('advertise/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise', 'AdvertiseController@add');

    Route::get('advertise/zirnevis', 'AdvertiseController@zirnevisManage');
    Route::get('advertise/zirnevis/delete/{id}', 'AdvertiseController@zirnevisDelete');
    Route::put('advertise/zirnevis', 'AdvertiseController@zirnevisAdd');

//end manager login

    Route::get('advertise/dynamic', 'AdvertiseController@dynamicManage');
    Route::get('advertise/dynamic/delete/{id}', 'AdvertiseController@dynamicDelete');
    Route::put('advertise/dynamic', 'AdvertiseController@dynamicAdd');

    Route::put("add/sit" , "OrderController@addSit");
    Route::get("reserved" , "OrderController@showReserved");
    Route::get("sit/setting" , "OrderController@sitSetting");
    Route::get("rm-sit/{id}" , "OrderController@rmvSit");

    // category
Route::get("category" , "CategoryController@show");
Route::put("category" , "CategoryController@add");
Route::patch("category" , "CategoryController@update");
Route::get("category/delete/{id}" , "CategoryController@mainDelete");
Route::get("category/sub/delete/{id}" , "CategoryController@subDelete");

});

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});
//end advertise
