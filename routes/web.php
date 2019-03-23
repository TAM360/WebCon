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
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('home');
});


// product searching routes
Route::get('/search', 'SearchProductsController@index');
Route::get('/filter', 'SearchProductsController@searchByFilter')->name('filter');
Route::get('/algolia/search', 'SearchProductsController@searchByAlgolia');
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

