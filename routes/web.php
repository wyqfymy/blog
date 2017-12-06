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
//后台登录页
Route::get('admin/login', 'Admin\LoginController@login');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('admin/dologin', 'Admin\LoginController@dologin');

//后台登录中间件
Route::group(['middleware'=>'islogin'], function(){
	//后台首页
	// dd(Session::get('user'));
	Route::get('admin/index', function () {
    	return view('admin.index');
	});
	//后台用户模块
	Route::get('/admin/user/create','Admin\UserController@create');
	Route::post('/admin/user/store','Admin\UserController@store');
	Route::get('/admin/user/index','Admin\UserController@index');
	Route::get('admin/user/edit/{id}','Admin\UserController@edit');
	Route::post('admin/user/update/{id}','Admin\UserController@update');
	Route::post('admin/user/del/{id}','Admin\UserController@destroy');
	Route::resource('admin/cate','Admin\CateController');
	
	// Route::resource('admin/cate','Admin\TestController');

	Route::post('admin/cate/changeorder','Admin\CateController@changeOrder');


});


// 前台登录
Route::get('home/hlogin','Home\LoginController@login');
Route::get('home/yzm', 'Home\LoginController@yzm');
Route::get('code/captcha/{tmp}', 'Home\LoginController@captcha');
Route::post('home/dologin', 'Home\LoginController@dologin');
// Route::post('home/dologin', function(){
// 	return 1111;
// });

// 前台显示
Route::get('home/hindex','Home\BlogController@index');