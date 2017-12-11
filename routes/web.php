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

// <<<<<<< HEAD
// 后台用户
// // 
Route::get('/admin/user/create','Admin\UserController@create');
Route::post('/admin/user/store','Admin\UserController@store');
Route::get('/admin/user/index','Admin\UserController@index');
Route::get('admin/user/edit/{id}','Admin\UserController@edit');
Route::post('admin/user/update/{id}','Admin\UserController@update');
Route::post('admin/user/del/{id}','Admin\UserController@destroy');


// =======
Route::get('/', function () {
    return view('admin.index');
});

//菜单路由
//Route::get('/admin/menu/add', 'Admin\MenuController@add');
//Route::post('/admin/menu/insert', 'Admin\MenuController@insert');
//Route::get('/admin/menu/index', 'Admin\MenuController@index');

Route::get('admin/login', 'Admin\LoginController@login');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('admin/dologin', 'Admin\LoginController@dologin');
// >>>>>>> origin/lwx

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
Route::post('home/pinglun','Home\PinglunController@create');
Route::post('home/pinglun/index','Home\PinglunController@index');








//文章模块 (后台)
Route::get('admin/article/index','Admin\ArticleController@index');
Route::get('admin/article/add','Admin\ArticleController@add');
Route::post('admin/upload','Admin\ArticleController@upload');
Route::post('admin/article/create','Admin\ArticleController@create');

//文章前台
Route::get('home/article/{id}','Home\ArticleController@article');