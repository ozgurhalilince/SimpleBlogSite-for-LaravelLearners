<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

	Route::get('/', 'AdminPagesController@home');
	Route::get('/ayarlar', 'AdminPagesController@settings');
	Route::get('/hakkimda', 'AdminPagesController@aboutme');
	Route::resource('/yazilar', 'PostController');
	Route::resource('/etiketler', 'TagController');
	Route::resource('/kategoriler', 'CategoryController');
	Route::resource('/yorumlar', 'CommentController');
	Route::resource('/user', 'UserController', ['only' => ['update']]);
});


Route::group(['middleware' => 'guest'], function(){

	// here will develop...
});


Auth::routes();


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/', function () {
    return redirect('/login');
});