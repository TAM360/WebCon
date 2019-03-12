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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/edit', function () {
    return view('auth.edit');
});

Route::get('/search', 'SearchProductsController@index');
Route::get('/item', function () {
    return view('item');
});
Route::get('/filter', 'SearchProductsController@searchByFilter')->name('filter');
Route::get('/search/algolia', 'SearchProductsController@searchByAlgolia');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('messages', 'ChatsController@index')->name('chats');

Route::get("insert", 'UploadProject@index');
Route::get("project", 'UploadProject@show');
Route::post("store", 'UploadProject@store');
Route::post("setbid", 'BidingController@store');