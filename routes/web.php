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
    return view('welcome');
});

Route::group(['namespace' => 'Admin'], function() {
	Route::group(['prefix' => 'admin'], function () {
	    Route::resource('home', 'HomeController');

	    Route::get('/', function () {
    		return view('admin.master');
		});

		Route::group(['prefix' => 'categories'], function () {
			// Route::resource('', 'CategoryController');
			Route::get('create', ['as' => 'adminaddcate', 'uses' => 'CategoryController@create']);
			Route::post('post', ['as' => 'adminaddcate', 'uses' => 'CategoryController@store']);
			Route::get('',['as' => 'admincate', 'uses' => 'CategoryController@index']);
			Route::get('/{category}/edit',['as' => 'admineditcate', 'uses' => 'CategoryController@edit']);
			Route::patch('/{category}/update',['as' => 'adminupdatecate', 'uses' => 'CategoryController@update']);
			Route::delete('/{category}/del',['as' => 'admindelcate', 'uses' => 'CategoryController@destroy']);
		});

		Route::group(['prefix' => 'users'], function () {
			Route::get('',['as' => 'adminusers', 'uses' => 'UserController@index']);
			Route::get('{user}/edit',['as' => 'adminedit', 'uses' => 'UserController@edit']);
			Route::delete('{user}/del',['as' => 'admindeluser', 'uses' => "UserController@destroy"]);
		});

		Route::group(['prefix' => 'news'], function () {
			Route::get('', ['as' => 'adminnews', 'uses' => 'NewsController@index']);
			Route::get('create',['as' => 'adminaddnews', 'uses' => 'NewsController@create']);
			Route::post('post', ['as' => 'adminaddnews', 'uses' => 'NewsController@store']);
			Route::get('{news}',['as' => 'adminnewnews', 'uses' => 'NewsController@new']);
			Route::get('/{news}/edit',['as' => 'admineditnews', 'uses' => 'NewsController@edit']);
			Route::patch('/{news}/update',['as' => 'adminupdatenews', 'uses' => 'NewsController@update']);
			Route::delete('/{news}/del',['as' => 'admindelnews', 'uses' => 'NewsController@destroy']);
		});

		Route::get('/login',['as' => 'adminlogin', 'uses' => 'LoginController@create']);
		Route::post('/login',['as' => 'adminlogin', 'uses' => 'LoginController@store']);
		Route::get('/logout',['as' => 'adminlogout', 'uses' => 'LoginController@destroy']);
	});
});

Route::group(['namespace' => 'Frontend'], function() {
	Route::resource('', 'HomeController');
	Route::get('news/search', ['as' => 'search', 'uses' => 'HomeController@search']);
	Route::resource('news', 'NewsController');
});
