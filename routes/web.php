<?php

Route::get('/', 'HomeController@home')->name('home');
Route::get('/benefits', 'HomeController@benefits');
Route::get('/contact-us', 'HomeController@contactUs');
//new
Route::get('/collaborate-with-fastFood-maker', 'HomeController@collaborateWithFastFoodMaker');
Route::get('/collaborate-with-game-developers', 'HomeController@collaborateWithGameDevelopers');
Route::get('/how-to-order', 'HomeController@howToOrder');
Route::get('/make-game-for-us', 'HomeController@makeGameForUs');
//end new


Route::get('/food/{food}/{alert?}', 'HomeController@showFood');
Route::get('/restaurants', 'HomeController@showRestaurants');
//front > game
Route::get('/games-page', 'HomeController@gamesPage');
Route::get('/game/{game}', 'HomeController@game')->name('front.game');
Route::get('/gameDetails/{game}', 'HomeController@gameDetails')->name('front.detalisGame');
Route::post('check-buycode', 'HomeController@checkBuycode');

Route::get('/login', 'HomeController@loginPage')->name('login');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/order', 'HomeController@order');

Route::get("/basket", 'BasketController@show');
Route::get("/add-to-basket/{id}", 'BasketController@add');
Route::get("/remove-from-basket/{id}", 'BasketController@remove');
Route::get("/checkout", 'BasketController@checkout');
Route::get("/reply", 'BasketController@reply');
Route::get("/status", 'BasketController@status');

Route::get("edit", "BasketController@takmil");
Route::put("edit", "BasketController@takmiler");


Route::get("reserve/{id?}", 'HomeController@reserve');
Route::post('reserve/{id?}', 'HomeController@addReserve');

//user register
Route::get("register", "RegisterController@show");
Route::put("register", "RegisterController@register");

// manager
Route::group(['prefix' => 'manager', 'middleware' => 'auth'], function () {
    Route::get("/", "ManagerController@show")->name('admin.home');
    //manager > cyberspace

    Route::get('cyberspace/', 'back\CyberspaceController@index')->name('admin.cyberspace');
    Route::get('cyberspace/edit/{cyberspace}', 'back\CyberspaceController@edit')->name('admin.cyberspace.edit');
    Route::put('cyberspace/update/{cyberspace}', 'back\CyberspaceController@update')->name('admin.cyberspace.update');

//manager > comments
    Route::get('comments/', 'back\CommentController@index')->name('admin.comments');
    Route::get('comments/edit/{comment}', 'back\CommentController@edit')->name('admin.comments.edit');
    Route::put('comments/update/{comment}', 'back\CommentController@update')->name('admin.comments.update');
    Route::get('comments/destroy/{comment}', 'back\CommentController@destroy')->name('admin.comments.destroy');
    Route::get('comments/user/status/{comment}', 'back\CommentController@updateStatus')->name('admin.comments.status');

//manager > advertise
    Route::get('advertiseUser', 'AdvertiseController@showAdvUser')->name('admin.advertiseUser');

    Route::get('advertise', 'AdvertiseController@show');
    Route::get('advertise/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise', 'AdvertiseController@add');

    Route::get('advertise/zirnevis', 'AdvertiseController@zirnevisManage');
    Route::get('advertise/zirnevis/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise/zirnevis', 'AdvertiseController@zirnevisAdd');

    Route::get('advertise/dynamic', 'AdvertiseController@dynamicManage');
    Route::get('advertise/dynamic/delete/{id}', 'AdvertiseController@delete');
    Route::put('advertise/dynamic', 'AdvertiseController@dynamicAdd');
//end advertise


//tables
    Route::put("add/sit", "OrderController@addSit");
    Route::get("reserved", "OrderController@showReserved");
    Route::get("sit/setting", "OrderController@sitSetting");
    Route::get("rm-sit/{id}", "OrderController@rmvSit");
//tableInfo

    Route::put("tableInfo/{id}", "back\TableInfoController@update")->name('tableInfo.update');



//admin detail res
    Route::get("detail-res", "OptionController@detail");
    Route::post("detail-res", "OptionController@editDetail");

//manage pays
    Route::get('manage-pays', 'PayController@show');
    Route::get('remove-pay/{id}', 'PayController@removePay');
    Route::get('detail-pay/{id}', 'PayController@detailPay');

//admin manage users
    Route::get("manage-users", "UserController@showUsers");
    Route::get("show-user/{id}", "UserController@showUser");
    Route::get("remove-user/{id}", "UserController@remove");
    Route::post("promote/{id}", "UserController@promote");
    Route::post("promote_res/{id}", "UserController@promote_res");

// about us and benefits
    Route::post("upload", 'OptionController@upload');
    Route::get("about-us", 'OptionController@aboutUs');
    Route::post("about-us", 'OptionController@addAbout');
    Route::get("benefits", 'OptionController@benefits');
    Route::post("benefits", 'OptionController@addBenefits');

// category
    Route::get("category", "CategoryController@show");
    Route::put("category", "CategoryController@add");
    Route::patch("category", "CategoryController@update");
    Route::get("category/delete/{id}", "CategoryController@mainDelete");
    Route::get("category/sub/delete/{id}", "CategoryController@subDelete");


// product
    Route::get("add-food", 'FoodController@show');
    Route::put("add-food", 'FoodController@add');
    Route::get("show-foods", "FoodController@managefoods");

    Route::get("remove-product/{id}", "FoodController@deleteFood");
    Route::get("edit-product/{id}", "FoodController@show");
    Route::patch("edit-product/{id}", "FoodController@update");

//slides
    Route::get("slides/delete/{id}", "SlideController@delete");
    Route::get("slides", "SlideController@show");
    Route::put("slides", "SlideController@add");

// manager > games
    Route::get("games", "GameController@manage");
    Route::get("send-game", "GameController@sendPage");
    Route::get("download-game/{game}", "GameController@download");
    Route::get("verification-game/{game}", "GameController@verify");
    Route::get("specialGame/{game}", "GameController@special")->name('specialGame');
    Route::get("block-game/{game}", "GameController@block");
    Route::put("games", "GameController@add");
    Route::get("games/{id}", "GameController@delete");
//events
    Route::resource("events", "EventController");

});
//end manager
Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});
//comment front
Route::post('/comment/{game}', 'CommentController@storeG')->name('game.comment');

Route::post('/comment/{restaurant}', 'CommentController@storeR')->name('restaurant.comment');



Route::get('/test1', function () {
    dd(json_encode(\App\Food::all()));
});


