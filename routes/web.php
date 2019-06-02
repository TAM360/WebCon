<?php
use App\Http\Controllers\ShoppingCartController;

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
Auth::routes();

// email verification
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});

// product searching routes
Route::get('/search', 'SearchProductsController@index');
Route::get('/filter', 'SearchProductsController@searchByFilter')->name('filter');
Route::get('/algolia/search', 'SearchProductsController@searchByAlgolia')->name('algoliaSearch');
Route::get('/algolia','SearchProductsController@algolia' );

// individual item route 
Route::get('/item', function () {
    return view('item');
});

// chat messaging routes
Route::get('/messages', 'ChatsController@index');
Route::get('/texts', 'ChatsController@fetchMessages');
Route::post('/text', 'ChatsController@sendMessage');

// bidding and project uploading routes
Route::get("/insert", 'UploadProject@index');
Route::get("/project", 'UploadProject@show');
Route::post("/store", 'UploadProject@store');
Route::post("/setbid", 'BidingController@store');

// add products
Route::get("/products/add", "AddProductsController@index");
Route::post("/products/new", "AddProductsController@store")->name('new_product');
Route::get("products/all", "AddProductsController@showAllProducts")->name('all_products');
Route::get("/products/destroy/{id}", "AddProductsController@destroy");
Route::post("/products/update/{id}", "AddProductsController@update")->name('update_product');

Route::get('/cost/index','CostController@index');
Route::get('/cost/store','CostController@store');
Route::get('/cost/store1','CostController@store1');

// cart routes
Route::get('/cart', 'ShoppingCartController@index');
Route::get('/cart/checkout', 'ShoppingCartController@checkout')->name('checkout');
Route::post('/cart/add', 'ShoppingCartController@store')->name('cart-item');
Route::post('/cart/payment', "ShoppingCartController@onlinePayment")->name("pay-online");
Route::delete('/cart/destroy', "ShoppingCartController@destroy")->name("destroy-cart");

Route::get('/profile/edit', function() {
    return view('auth.edit');
});