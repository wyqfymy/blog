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

//菜单路由
//Route::get('/admin/menu/add', 'Admin\MenuController@add');
//Route::post('/admin/menu/insert', 'Admin\MenuController@insert');
//Route::get('/admin/menu/index', 'Admin\MenuController@index');

Route::get('admin/login', 'Admin\LoginController@login');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::get('code/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::post('admin/dologin', 'Admin\LoginController@dologin');

