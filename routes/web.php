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

use App\Tag;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin'], function() {
	Route::group(['prefix' => 'admin'], function () {
		Route::group(['middleware' => 'auth'], function () {
			Route::resource('home', 'HomeController');
		    Route::get('/', function () {
	    		return view('admin.master');
			});

			Route::group(['prefix' => 'categories'], function () {
				// Route::resource('', 'CategoryController');
				Route::get('create', ['as' => 'adminaddcate', 'uses' => 'CategoryController@create']);
				Route::post('post', ['as' => 'admincreatecate', 'uses' => 'CategoryController@store']);
				Route::get('',['as' => 'admincate', 'uses' => 'CategoryController@index']);
				Route::get('/{category}/edit',['as' => 'admineditcate', 'uses' => 'CategoryController@edit']);
				Route::patch('/{category}/update',['as' => 'adminupdatecate', 'uses' => 'CategoryController@update']);
				Route::delete('/{category}/del',['as' => 'admindelcate', 'uses' => 'CategoryController@destroy']);
			});

			Route::group(['prefix' => 'users'], function () {
				Route::get('',['as' => 'adminusers', 'uses' => 'UserController@index']);
				Route::get('{users}/edit',['as' => 'adminedit', 'uses' => 'UserController@edit'])->middleware('can:users.update,users');
				Route::patch('{users}/edit',['as' => 'adminupdate', 'uses' => 'UserController@update'])->middleware('can:users.update,users');
				Route::delete('{users}/del',['as' => 'admindeluser', 'uses' => 'UserController@destroy']);
			});

			Route::group(['prefix' => 'news'], function () {
				Route::get('', ['as' => 'adminnews', 'uses' => 'NewsController@index']);
				Route::get('create',['as' => 'adminaddnews', 'uses' => 'NewsController@create']);
				Route::post('post', ['as' => 'adminstorenews', 'uses' => 'NewsController@store']);
				Route::get('{news}',['as' => 'adminnewnews', 'uses' => 'NewsController@new']);
				Route::get('/{news}/edit',['as' => 'admineditnews', 'uses' => 'NewsController@edit'])->middleware('can:news.update,news');
				Route::patch('/{news}/update',['as' => 'adminupdatenews', 'uses' => 'NewsController@update'])->middleware('can:news.update,news');
				Route::delete('/{news}/del',['as' => 'admindelnews', 'uses' => 'NewsController@destroy'])->middleware('can:news.destroy,news');
				// Route::get('create/json', ['as' => 'jsonnews', 'uses' => 'NewsController@json']);
				Route::get('create/json', function() {
					$tag = Tag::all()->pluck('name')->toArray();
					return response($tag);
				});
			});

			// Route::resource('tags','TagController');
			Route::group(['prefix' => 'tags'], function () {
				Route::get('',['as' => 'admintags', 'uses' => 'TagController@index']);
				Route::get('create',['as' => 'admincreatetag', 'uses' => 'TagController@create']);
				Route::post('store',['as' => 'adminstoretag', 'uses' => 'TagController@store']);
				Route::delete('{tag}/del',['as' => 'admindeltag', 'uses' => 'TagController@destroy']);
				Route::get('{tag}/edit',['as' => 'adminedittag', 'uses' => 'TagController@edit']);
				Route::patch('{tag}/update',['as' => 'adminupdatetag', 'uses' => 'TagController@update']);
			});	
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
	Route::get('/category/{category}/posts',['as' => 'postbycate', 'uses' => 'NewsController@postBycate']);
	Route::get('/tag/{tag}/posts',['as' => 'postbytag', 'uses' => 'NewsController@postBytag']);
	Route::get('/register',['as' => 'register', 'uses' => 'UserController@create']);
	Route::post('/store',['as' => 'store', 'uses' => 'UserController@store']);
});
