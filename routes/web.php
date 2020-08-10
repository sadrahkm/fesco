<?php

use Illuminate\Support\Facades\Route;

Route::group(["namespace" => "Admin", "prefix" => "admin", "middleware" => "isAdmin"], function () {
    Route::redirect('/','admin/settings');
//    Users
    Route::get("users/index", "UsersController@index")->name("admin.users.index");
    Route::get("users/create", "UsersController@create")->name("admin.users.create");
    Route::post("users/create", "UsersController@store")->name("admin.users.store");

//    Foods
    Route::get("foods/index", "FoodsController@index")->name("admin.foods.index");
    Route::get("foods/create", "FoodsController@create")->name("admin.foods.create");
    Route::get("foods/edit/", "FoodsController@create")->name("admin.foods.create");
    Route::post("foods/create", "FoodsController@store")->name("admin.foods.store");

//    Orders
    Route::get("orders", "OrdersController@index")->name("admin.orders.index");

//    Categories
    Route::get("categories", "CategoriesController@index")->name("admin.categories.index");
    Route::get("categories/create", "CategoriesController@create")->name("admin.categories.create");
    Route::post("categories/create", "CategoriesController@store")->name("admin.categories.store");

//    Reserves
    Route::get("reserves", "ReservesController@index")->name("admin.reserves.index");
//    Coupon
    Route::get('coupon','CouponController@index')->name('admin.coupon.index');
    Route::get('coupon/create','CouponController@create')->name('admin.coupon.create');
    Route::post('coupon/create','CouponController@store')->name('admin.coupon.store');
//    Settings
    Route::redirect('settings','settings/header')->name('admin.settings.index');
    Route::get('settings/header','SettingsController@header')->name('admin.settings.header');
    Route::get('settings/about_us','SettingsController@aboutUs')->name('admin.settings.aboutUs');
    Route::get('settings/specials','SettingsController@specials')->name('admin.settings.specials');
    Route::get('settings/menu','SettingsController@menu')->name('admin.settings.menu');
    Route::get('settings/reserve','SettingsController@reserve')->name('admin.settings.reserve');
    Route::get('settings/contact','SettingsController@contact')->name('admin.settings.contact');
    Route::post('settings','SettingsController@storeSettings')->name('admin.settings.store');

});

Route::group(["namespace" => "Frontend"], function () {
//    Auth Routes
    Route::get("/", "HomeController@show")->name("homepage");
    Route::get("login", "UserController@showAuthPage")->name("frontend.login.show")->middleware("isUserLogin:false");
    Route::post("dologin", "UserController@doLogin")->name("frontend.login.doLogin");
    Route::post("doregister", "UserController@doRegister")->name("frontend.login.doRegister");
    Route::get("logout", "UserController@logout")->name("logout");
//    Cart Panel
    Route::group(['prefix' => "panel", "middleware" => "isUserLogin:true"], function () {
        Route::redirect("/", "panel/info");
        Route::get("info", "PanelController@info")->name("frontend.panel.info");
        Route::get("orders", "PanelController@orders")->name("frontend.panel.orders");
        Route::post("orders/foods", "PanelController@orderFoods")->name("frontend.panel.orders.foods");
        Route::get("reserves", "PanelController@reserves")->name("frontend.panel.reserves");
    });
    Route::post("panel/{user_id}", "PanelController@edit")->name("frontend.users.edit");
//    Reserves
    Route::post("reserve", "ReserveController@verifyReserve")->name("frontend.reserve")->middleware("isUserLogin:true,frontend.login.show,error,لطفا ابتدا وارد حساب خود شوید.");
    Route::post("reserve/submit", "ReserveController@doReserve")->name("frontend.doReserve");
//    Cart
    Route::post('addCart','CartController@add');
    Route::get('cart','CartController@index')->name('frontend.cart.index');
    Route::get('cart/delete/{food_id}','CartController@delete')->name('frontend.cart.delete');
    Route::post('cart/clear','CartController@clearCart')->name('frontend.cart.clear');
    Route::post('checkCoupon','CouponController@check')->name('frontend.cart.couponCheck');
    Route::get('cart/checkout','CartController@checkout')->name('frontend.cart.checkout')->middleware('CartPreventPages');
    Route::post('cart/increase','CartController@increaseCartItem')->name('frontend.cart.increase');
    Route::post('cart/verify','PaymentController@verify');
    Route::get('cart/verify','PaymentController@verifyPage')->name('frontend.cart.verifyPage')->middleware('CartPreventPages');
//    Menu Page
    Route::get('menu','MenuController@index')->name('frontend.menu.index');
});
