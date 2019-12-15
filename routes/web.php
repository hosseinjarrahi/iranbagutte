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

Route::get('/login', 'HomeController@loginPage')->name('login');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/order', 'HomeController@order');

Route::get("/basket" , 'BasketController@show');
Route::get("/add-to-basket/{id}" , 'BasketController@add');
Route::get("/remove-from-basket/{id}" , 'BasketController@remove');
Route::get("/checkout" , 'BasketController@checkout');
Route::get("/reply" , 'BasketController@reply');
Route::get("/status" , 'BasketController@status');

Route::get("reserve/{id?}" , 'HomeController@reserve');
Route::post('reserve/{id?}' , 'HomeController@addReserve');

Route::group(['prefix' => 'manager','middleware' => 'auth'], function () {

    Route::get("/", "ManagerController@show");
    Route::get('home', "ManagerController@home")->name('admin.home');
//advertise
    Route::get('advertise', 'AdvertiseController@show');
    Route::get('advertise/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise', 'AdvertiseController@add');

    Route::get('advertise/zirnevis', 'AdvertiseController@zirnevisManage');
    Route::get('advertise/zirnevis/delete/{id}', 'AdvertiseController@zirnevisDelete');
    Route::put('advertise/zirnevis', 'AdvertiseController@zirnevisAdd');

    Route::get('advertise/dynamic', 'AdvertiseController@dynamicManage');
    Route::get('advertise/dynamic/delete/{id}', 'AdvertiseController@dynamicDelete');
    Route::put('advertise/dynamic', 'AdvertiseController@dynamicAdd');
//tables
    Route::put("add/sit" , "OrderController@addSit");
    Route::get("reserved" , "OrderController@showReserved");
    Route::get("sit/setting" , "OrderController@sitSetting");
    Route::get("rm-sit/{id}" , "OrderController@rmvSit");

//admin detail res
    Route::get("detail-res","OptionController@detail");
    Route::post("detail-res","OptionController@editDetail");

//manage pays
    Route::get('manage-pays' , 'PayController@show');
    Route::get('remove-pay/{id}' , 'PayController@removePay');
    Route::get('detail-pay/{id}' , 'PayController@detailPay');

//admin manage users
    Route::get("manage-users" , "UserController@showUsers");
    Route::get("show-user/{id}" , "UserController@showUser");
    Route::get("remove-user/{id}" , "UserController@remove");
    Route::post("promote/{id}" , "UserController@promote");

// about us and benefits
    Route::post("upload" , 'OptionController@upload');
    Route::get("about-us" , 'OptionController@aboutUs');
    Route::post("about-us" , 'OptionController@addAbout');
    Route::get("benefits" , 'OptionController@benefits');
    Route::post("benefits" , 'OptionController@addBenefits');

// category
    Route::get("category" , "CategoryController@show");
    Route::put("category" , "CategoryController@add");
    Route::patch("category" , "CategoryController@update");
    Route::get("category/delete/{id}" , "CategoryController@mainDelete");
    Route::get("category/sub/delete/{id}" , "CategoryController@subDelete");

// product
    Route::get("add-food" , 'FoodController@show');
    Route::put("add-food" , 'FoodController@add');
    Route::get("show-foods" , "FoodController@managefoods");

    Route::get("remove-product/{id}" , "FoodController@deleteFood");
    Route::get("edit-product/{id}" , "FoodController@show");
    Route::patch("edit-product/{id}" , "FoodController@update");

//slides
    Route::get("slides/delete/{id}" , "SlidesController@delete");
    Route::get("slides" , "SlidesController@show");
    Route::put("slides" , "SlidesController@add");

// games
    Route::get("games","GameBoxController@manage");
    Route::put("games","GameBoxController@add");
    Route::get("games/{id}","GameBoxController@delete");

});

Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});
