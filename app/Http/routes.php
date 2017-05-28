<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('foo', 'FooController@foo');

Route::resource('articles', 'ArticlesController');


Route::get('article/manage', 'ArticlesController@manage');


Route::get('tags/{tags}', 'TagsController@show');
Route::get('tags', 'TagsController@index');
Route::post('tags', 'TagsController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',

	]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/articles', 'ArticlesController@index');
    Route::get('/', 'HomeController@index');
});
//
//
//Route::get('foo', ['middleware' => ['auth', 'manager'], function(){
//    return 'this page may only be for Admin';
//}]);
