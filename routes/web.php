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
//
//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['namespace' => 'AdminPanel', 'prefix' => 'adminpanel'], function () {
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('home', 'HomeController@index')->name('home');

    //Posts Routing
    Route::resource('posts', 'PostController', ['except' => ['show']]);

    //Categories Routing
    Route::resource('categories', 'CategoryController', ['except' => ['show']]);
});

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::resource('posts', 'PostController', ['only' => ['show']]);
    Route::resource('categories', 'CategoryController', ['only' => ['show']]);

});


