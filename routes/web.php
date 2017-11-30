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

// 后台用户
// // 
Route::get('/admin/user/create','Admin\UserController@create');
Route::post('/admin/user/store','Admin\UserController@store');
Route::get('/admin/user/index','Admin\UserController@index');
Route::get('admin/user/edit/{id}','Admin\UserController@edit');
Route::post('admin/user/update/{id}','Admin\UserController@update');
Route::get('admin/user/del/{id}','Admin\UserController@destroy');



