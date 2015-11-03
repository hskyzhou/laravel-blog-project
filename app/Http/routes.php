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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*后台路由组*/
Route::group(['middleware' => ['auth', 'before.menu'], 'namespace' => 'Admin'], function(){
	// 配置后台首页
	Route::controller('admin', 'AdminController');
	/*文章*/
	Route::controller('article', 'ArticleController');
	/*菜单*/
	Route::controller('menu', 'MenuController');
	/*角色*/
	Route::controller('role', 'RoleController');
	/*权限*/
	Route::controller('permission', 'PermissionController');
	/*用户*/
	Route::controller('user', 'UserController');
	/*日志*/
	Route::controller('log', 'LogController', [
		'getDetail' => 'log.detail',
		'getList' => 'log.list',
		'getType' => 'log.type',
		'getDownload' => 'log.download'
	]);
});

/*前台路由组*/
Route::get('/', 'Front\IndexController@index');
Route::group(['namespace' => 'Front'], function(){
	Route::controller('articles', 'IndexController', [
		'getDetail' => 'articles.detail',
		'getList' => 'articles.list'
	]);
});


Route::controller('demo', 'MenuController');