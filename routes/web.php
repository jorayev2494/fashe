<?php

// Маршрут для Гостей сайта
Route::get("/", ["uses" => "IndexController@index", "as" => "index"]);
Route::get("/category/{link?}", ["uses" => "IndexController@products", "as" => "category.product"]);
Route::get("/product/show/{id}", ["uses" => "IndexController@show", "as" => "show.product"]);
Route::get("/product/search",["uses" => "IndexController@search", "as" => "search.product"]);
Route::get("/about", ["uses" => "IndexController@about", "as" => "about"]);
Route::match(["get", "post"], "/contacts", ["uses" => "IndexController@contact", "as" => "contact"]);
Route::post("/subscribe", ["uses" => "IndexController@subscribe", "as" => "subscribe"]);


// Корзина  echo "Author:  jorayev2494@gmail.com";
Route::post("/cart", ["uses" => "CartController@index", "as" => "cart.cart"]);
Route::post("/cart/add/{id}", ["uses" => "CartController@add", "as" => "add.cart"]);
Route::post("/cart/show_header", ["uses" => "CartController@show_header", "as" => "show_header.cart"]);
Route::post("/cart/destroy/{id}", ["uses" => "CartController@destroy", "as" => "delete.cart"]); // cart.order.chekout
Route::get("/cart/show", ["uses" => "CartController@show", "as" => "show.cart"]);
Route::post("/cart/auto_price", ["uses" => "CartController@auto_price", "as" => "auto_price.cart"]);
Route::post("/cart/clear_cart", ["uses" => "CartController@clear_cart", "as" => "clear.cart"]);
// Оформить заказ
Route::post("/cart/order_che", ["uses" => "CartController@cart_order", "as" => "order.checkout.cart"]);

// Авторизация и Аутентификация
Auth::routes();
Route::get("/home", "HomeController@index")->name("home");

// Маршрут для Авторизованных пользователям
Route::group(["middleware" => ["auth"], "as" => "profile."], function () {
    Route::get("user/profile", ["uses" => "ProfileController@show", "as" => "show"]);
    Route::get("user/edit", ["uses" => "ProfileController@edit", "as" => "edit"]);
    Route::post("user/upload", ["uses" => "ProfileController@update", "as" => "upload"]);
    Route::get("user/orders", ["uses" => "ProfileController@orders", "as" => "orders"]);
});

// Маршрут для Администраторов и Модераторов
Route::group(["prefix" => "admin", "middleware" => ["auth", "admin"], "as" => "admin."], function() {
    Route::get("/dashboard", ["uses" => "Admin\AdminDashboardController@index", "as" => "dashboard"]);
    Route::resource("/users", "Admin\UsersController");
    Route::resource("/products", "Admin\ProductsController");
    Route::resource("/categories", "Admin\CategoriesController");
    Route::resource("/statuses", "Admin\StatusesController");
    Route::resource("/menus", "Admin\MenusController");
    Route::resource("/roles", "Admin\RolesController");
    Route::resource("/sliders", "Admin\SlidersController");
    Route::resource("/socials", "Admin\SocialsController");
    Route::resource("/orders", "Admin\OrdersController");
});
