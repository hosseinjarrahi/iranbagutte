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

Route::get("/" , "HomeController@home");

//user
Route::get("/login" , "UserController@showLogin");

Route::get("/logout" , "UserController@logout");

Route::get("/register" , "UserController@show");

Route::put("/register" , "UserController@register");

Route::post("/login" , "UserController@login");

Route::get("/edit" , "UserController@takmil");

Route::put("/edit" , "UserController@takmiler");

Route::get("/checkout" , "BasketController@checkout");

Route::get("/reply" , "BasketController@reply");

Route::post("/pcode/{id}" , "HomeController@pcode");

/*
 *
 *  _______________ admin ________________
 *
 */

// admin login
Route::get("/admin/login" , "AdminController@show");

Route::get("/admin/home" , "AdminController@home");

Route::post("/admin/login" , "AdminController@login");

Route::get("admin/logout" , "AdminController@logout");

//advertise
Route::get('admin/advertise' , 'AdvertiseController@show');
Route::get('admin/advertise/delete/{id}' , 'AdvertiseController@delete');
Route::put('admin/advertise' , 'AdvertiseController@add');

Route::get('admin/advertise/zirnevis' , 'AdvertiseController@zirnevisManage');
Route::get('admin/advertise/zirnevis/delete/{id}' , 'AdvertiseController@zirnevisDelete');
Route::put('admin/advertise/zirnevis' , 'AdvertiseController@zirnevisAdd');

Route::get('admin/advertise/dynamic' , 'AdvertiseController@dynamicManage');
Route::get('admin/advertise/dynamic/delete/{id}' , 'AdvertiseController@dynamicDelete');
Route::put('admin/advertise/dynamic' , 'AdvertiseController@dynamicAdd');

// table
Route::put("admin/add/sit" , "OrderController@addSit");
Route::get("admin/reserved" , "OrderController@showReserved");

//admin detail res
Route::get("admin/detail-Res" , "ResController@Adetail");
Route::post("admin/detail-Res" , "ResController@AeditDetail");

//manage pays
Route::get('admin/manage-pays' , 'PayController@show');
Route::get('admin/remove-pay/{id}' , 'PayController@removePay');
Route::get('admin/detail-pay/{id}' , 'PayController@detailPay');

//admin manage users
Route::get("admin/manage-users" , "UserController@showUsers");
Route::get("admin/manage-special-users" , "UserController@showSpecials");
Route::get("admin/manage-dev-users" , "UserController@showDevs");
Route::get("admin/remove-user/{type}/{id}" , "UserController@removeUser");
Route::get("admin/show-user/{id}" , "UserController@showUser");
Route::get("admin/promote-to-special/{id}" , "UserController@promoteToS");
Route::get("admin/promote-to-dev/{id}" , "UserController@promoteToD");

// about us and benefits
Route::post("admin/upload" , 'OptionController@upload');
Route::get("admin/about-us" , 'OptionController@aboutUs');
Route::post("admin/about-us" , 'OptionController@addAbout');
Route::get("admin/benefits" , 'OptionController@benefits');
Route::post("admin/benefits" , 'OptionController@addBenefits');

// category
Route::get("admin/category" , "CategoryController@show");
Route::put("admin/category" , "CategoryController@add");
Route::patch("admin/category" , "CategoryController@update");
Route::get("admin/category/delete/{id}" , "CategoryController@mainDelete");
Route::get("admin/category/sub/delete/{id}" , "CategoryController@subDelete");

// product
Route::get("admin/add-product" , 'ProductsController@show');
Route::put("admin/add-product" , 'ProductsController@add');
Route::get("admin/show-products" , "ProductsController@manageProducts");

Route::get("admin/remove-product/{id}" , "ProductsController@deleteProduct");
Route::get("admin/edit-product/{id}" , "ProductsController@show");
Route::patch("admin/edit-product/{id}" , "ProductsController@update");

//slides
Route::get("admin/slides/delete/{id}" , "SlidesController@delete");
Route::get("admin/slides" , "SlidesController@show");
Route::put("admin/slides" , "SlidesController@add");

// games
Route::get("admin/games" , "GameBoxController@manage");
Route::put("admin/games" , "GameBoxController@add");
Route::get("admin/games/{id}" , "GameBoxController@delete");
/*
 *
 *  ___________ restaurant_____________
 *
 */
//table
Route::get("/restaurant/sit/setting" , "ResController@sitSetting");

Route::get("/restaurant/rm-sit/{id}" , "ResController@rmvSit");

Route::put("restaurant/add/sit" , "ResController@addSit");

Route::get("restaurant/reserved" , "ResController@showReserved");

Route::get("admin/sit/setting" , "OrderController@sitSetting");

Route::get("admin/rm-sit/{id}" , "OrderController@rmvSit");

//detail res
Route::get("restaurant/detail-Res" , "ResController@detail");

Route::post("restaurant/detail-Res" , "ResController@editDetail");

//special
Route::get("restaurant/event" , 'ResController@specialShow');

Route::put("restaurant/add-event" , 'ResController@addEvent');

Route::put("restaurant/add-img-event" , 'ResController@addImgEv');

Route::delete("restaurant/rmv-img-event/{id}" , 'ResController@rmvImgEv');

// login logout
Route::get("restaurant/login" , "ResController@loginPage");

Route::get("restaurant/dashboard" , "ResController@dashboard");

Route::get("restaurant/logout" , "ResController@logout");

Route::post("restaurant/login" , "ResController@login");

//product
Route::post("restaurant/down" , "RestaurantsController@ajax");

Route::get("restaurant/remove-product/{id}" , "ResController@deleteProduct");

Route::get("/restaurant/edit-product/{id}" , "ResController@show");

Route::patch("restaurant/edit-product/{id}" , "ResController@update");

Route::get("restaurant/show-products" , "ResController@manageProducts");

Route::get("restaurant/add-product" , "ResController@show");

Route::put("restaurant/add-product" , "ResController@addProduct");

//slide
Route::get("restaurant/slides/delete/{id}" , "ResController@slideDelete");

Route::get("restaurant/slides" , "ResController@slideShow");

Route::put("restaurant/slides" , "ResController@slideAdd");

////cat
Route::get("restaurant/category" , "ResController@Catshow");

Route::put("restaurant/category" , "ResController@Catadd");

Route::patch("restaurant/category" , "ResController@Catupdate");

Route::get("/restaurant/category/delete/{id}" , "ResController@CatmainDelete");

Route::get("/restaurant/category/sub/delete/{id}" , "ResController@CatsubDelete");

/*
 * ________ user ________
 */
//order
Route::get("order" , 'OrderController@show');

Route::post("order/down/{id}" , 'OrderController@ajax');

//basket
Route::get("basket" , 'BasketController@show');

Route::get("add-to-basket/{id}" , 'BasketController@add');

Route::get("remove-from-basket/{id}" , 'BasketController@remove');

Route::get("checkout" , 'BasketController@checkout');

Route::get("reply" , 'BasketController@reply');

Route::get("status" , 'BasketController@status');

//foods
Route::get("/foods/{?page}" , 'FoodController@showAll');

Route::get("food/{id}/{?alert}" , "FoodController@show");

//options
//Route::get("about-us",'HomeController@aboutUs');

Route::get("benefits" , 'HomeController@benefits');
Route::get("contact-us" , 'HomeController@contactUs');

//reserve
Route::get("reserve/{?id}" , 'ReserveController@home');

Route::post('reserve/{?id}' , 'ReserveController@add');

//games
Route::get("games-page" , "GamesController@gamesPage");
Route::get("games/{id}" , "GamesController@show");

Route::get('advertise/{id}' , 'GamesController@redirectToAd');

//restaurants
Route::get("/restaurant/restaurantsPage" , function () {
	return view('res.restaurantsPage');
});

Route::get("/restaurants/{id}" , 'RestaurantsController@show');

/*
 *  ____________ developers ___________
 */

Route::get('/dev/login' , 'DevController@show');

Route::get('/dev/dashboard' , 'DevController@home');

Route::post("/dev/login" , "DevController@login");

Route::get("/dev/send" , "DevController@manageGame");

Route::put("/dev/send" , "DevController@send");

Route::get("/dev/delete/{id}" , "DevController@delete");

//Router::ge/t("g/{name}" , "GameController@generate");
