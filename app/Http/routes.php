<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', [
	'uses' => 'App\Http\Controllers\IndexController@index',
	'as'   => 'index',
]);

// auth.
$app->get('login', [
	'uses' => 'App\Http\Controllers\AuthController@getLogin',
	'as'   => 'login',
]);
$app->post('login', [
	'uses' => 'App\Http\Controllers\AuthController@postLogin',
	'as'   => 'login.post',
]);
$app->get('logout', [
	'uses' => 'App\Http\Controllers\AuthController@getLogout',
	'as'   => 'logout',
]);
$app->get('register', [
	'uses' => 'App\Http\Controllers\AuthController@getRegister',
	'as'   => 'register',
]);
$app->post('register', [
	'uses' => 'App\Http\Controllers\AuthController@postRegister',
	'as'   => 'register.post',
]);

$app->delete('user/{id:[0-9]+}', [
	'uses' => 'App\Http\Controllers\UserController@destroy',
	'as'   => 'user.destroy',
]);
$app->get('user/manage', [
	'uses' => 'App\Http\Controllers\UserController@manage',
	'as'   => 'user.manage',
]);

$app->post('token', [
	'uses' => 'App\Http\Controllers\UserTokenController@store',
	'as'   => 'token.store'
]);
$app->delete('token/{id:[0-9]+}', [
	'uses' => 'App\Http\Controllers\UserTokenController@destroy',
	'as'   => 'token.destroy'
]);


// category.
$app->get('category/create', [
	'uses' => 'App\Http\Controllers\CategoryController@create',
	'as'   => 'cate.create',
]);
$app->get('category/{slug}', [
	'uses' => 'App\Http\Controllers\CategoryController@show',
	'as'   => 'cate',
]);
$app->post('category', [
	'uses' => 'App\Http\Controllers\CategoryController@store',
	'as'   => 'cate.store',
]);
$app->get('category/{slug}/edit', [
	'uses' => 'App\Http\Controllers\CategoryController@edit',
	'as'   => 'cate.edit',
]);

// restful for doc.
$app->get('doc/{id:[0-9]+}', [
	'uses' => 'App\Http\Controllers\DocumentController@show',
	'as'   => 'doc.show',
]);
$app->get('doc/create', [
	'uses' => 'App\Http\Controllers\DocumentController@create',
	'as'   => 'doc.create',
]);

$app->post('doc', [
	'uses' => 'App\Http\Controllers\DocumentController@store',
	'as'   => 'doc.store',
]);

$app->get('doc/{id}/edit', [
	'uses' => 'App\Http\Controllers\DocumentController@edit',
	'as'   => 'doc.edit',
]);

$app->put('doc/{id}', [
	'uses' => 'App\Http\Controllers\DocumentController@update',
	'as'   => 'doc.update',
]);

$app->delete('doc/{id}', [
	'uses' => 'App\Http\Controllers\DocumentController@destroy',
	'as'   => 'doc.destroy',
]);
