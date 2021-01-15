<?php

Route::get('/', 'HomeController@home')->name('home');
Route::post('/get-gift-code', 'HomeController@gift');
Route::get('/check-code', 'HomeController@checkCodePage');
Route::post('/get-code', 'HomeController@getCode');
Route::post('/check-code', 'HomeController@checkCode');
Route::get('/benefits', 'HomeController@benefits');
Route::get('/contact-us', 'HomeController@contactUs');

Route::get('/call', 'HomeController@call');
Route::get('/delivery', 'HomeController@delivery');
//new
Route::get('/collaborate-with-fastFood-maker', 'HomeController@collaborateWithFastFoodMaker');
Route::get('/collaborate-with-game-developers', 'HomeController@collaborateWithGameDevelopers');
Route::get('/how-to-order', 'HomeController@howToOrder');
Route::get('/make-game-for-us', 'HomeController@makeGameForUs');
//end new
//search
Route::get("search", 'SearchController@show')->name('search');

//end search

Route::get('/food/{food}/{alert?}', 'HomeController@showFood');
Route::get('/restaurants', 'HomeController@showRestaurants');
//front > game
Route::get('/games-page', 'HomeController@gamesPage');
Route::get('/game/{game}', 'HomeController@game')->name('front.game');
Route::get('/gameDetails/{game}', 'HomeController@gameDetails')->name('front.detalisGame');

Route::post('/pay-game/{game}', 'HomeController@payGame')->name('pay.game');
Route::get('/pay-game}', 'HomeController@payGameCallback')->name('pay.game.callback');

Route::post('check-buycode', 'HomeController@checkBuycode');

Route::get('/login', 'HomeController@loginPage')->name('login');
Route::post('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout')->name('logout');

Route::get('/order', 'HomeController@order');

Route::get("/basket", 'BasketController@show');
Route::get("/add-to-basket/{id}", 'BasketController@add');
Route::get("/remove-from-basket/{id}", 'BasketController@remove');
Route::get("/checkout", 'BasketController@checkout')->name('checkout');
Route::get("/reply", 'BasketController@reply')->name('reply.to.pay');
Route::get("/status", 'BasketController@status');

Route::get("edit", "BasketController@takmil");
Route::put("edit", "BasketController@takmiler");


Route::get("reserve/{id?}", 'HomeController@reserve')->name('user.reserve');
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

    Route::get('advertise/price', 'AdvertiseController@adverPrice')->name('adver.price');
    Route::post('advertise/price', 'AdvertiseController@adverPriceChange')->name('adver.price.change');

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


    Route::get("call", 'OptionController@call');
    Route::post("call", 'OptionController@addCall');

    Route::get("delivery", 'OptionController@delivery');
    Route::post("delivery", 'OptionController@addDelivery');

    //maneger homepages
    // about us and benefits
    Route::post("upload", 'OptionController@upload');
    Route::get("about-us", 'OptionController@aboutUs');
    Route::post("about-us", 'OptionController@addAbout');
    Route::get("benefits", 'OptionController@benefits');
    Route::post("benefits", 'OptionController@addBenefits');
    //other
    Route::get("WorkWithUs", 'OptionController@WorkWithUs');
    Route::post("WorkWithUs", 'OptionController@addWorkWithUs');

    Route::get("HowToOrder", 'OptionController@HowToOrder');
    Route::post("HowToOrder", 'OptionController@addHowToOrder');

    Route::get("ContactUs", 'OptionController@ContactUs');
    Route::post("ContactUs", 'OptionController@addContactUs');

    Route::get("CollaborateWithGameMakers", 'OptionController@CollaborateWithGameMakers');
    Route::post("CollaborateWithGameMakers", 'OptionController@addCollaborateWithGameMakers');

    Route::get("MakeAGameForUs", 'OptionController@MakeAGameForUs');
    Route::post("MakeAGameForUs", 'OptionController@addMakeAGameForUs');

    Route::get("CooperationWithFastFoods", 'OptionController@CooperationWithFastFoods');
    Route::post("CooperationWithFastFoods", 'OptionController@addCooperationWithFastFoods');

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
//manager > events
    Route::get('event/create', 'EventController@create')->name('event.create');
    Route::post('event/store', 'EventController@store')->name('event.store');
    Route::get('event/edit/{comment}', 'EventController@edit')->name('event.edit');
    Route::put('event/update/{comment}', 'EventController@update')->name('event.update');
    Route::get('event/destroy/{comment}', 'EventController@destroy')->name('event.destroy');
    Route::get("all-events","EventController@show")->name("event.show");
//manager > buycode
    Route::resource('buycode', 'BuyCodeController');
});
//user > buycode
Route::get('myCood', 'BuyCodeController@myCode')->name('user.myCode');
Route::get('/user/myCood', 'BuyCodeController@userMyCode');

//event user
Route::get('event/', 'EventController@index')->name('event');
//end event user
Route::group(['prefix' => 'restaurant'], function () {
    Route::get('{restaurant}', 'HomeController@showRestaurant');
    Route::post('down', 'HomeController@ajax');
});
//comment front
Route::post('/comment/{game}', 'CommentController@storeG')->name('game.comment');

Route::post('/comment/{restaurant}', 'CommentController@storeR')->name('restaurant.comment');

// user dahboard
Route::get('/user/dashboard','UserDashboard@index')->name('user.dashboard')->middleware('auth');
Route::get('/user/dashboard/advertise','UserDashboard@advertise')->name('user.dashboard.advertise')->middleware('auth');

Route::get('/user/dashboard/pay','UserDashboard@payAds')->name('user.dashboard.payAds')->middleware('auth');
Route::get('/user/dashboard/payback','UserDashboard@payAdsCallback')->name('user.dashboard.payAdsCallback')->middleware('auth');
Route::get('/user/dashboard/code','UserDashboard@code')->name('user.dashboard.code')->middleware('auth');

// buycodes
Route::get('/buycodes','HomeController@buycodes')->middleware('auth');
Route::get('/buycodes/product/{buycode}','BasketController@runBuycode')->name('run.buycode')->middleware('auth');
Route::get('/buycodes/product/reply/complete','BasketController@replyBuycode')->name('reply.buycode')->middleware('auth');
