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




// =======
Route::get('/', function () {
// <<<<<<< HEAD
    return view('admin.index');
});

	// 后台登录
	Route::get('admin/login', 'Admin\LoginController@login');
	Route::get('admin/yzm', 'Admin\LoginController@yzm');
	Route::get('code/captcha/{tmp}', 'Admin\LoginController@captcha');
	Route::post('admin/dologin', 'Admin\LoginController@dologin');

// 后台用户的查看
	Route::get('/admin/user/index','Admin\UserController@index');
// Route::group(['middleware'=>['hasrole']],function(){
	// 角色管理
	Route::get('role/auth/{id}','Admin\RoleController@auth');
	Route::post('role/doauth','Admin\RoleController@doauth');
	Route::resource('role','Admin\RoleController');
	// 权限查看
	Route::get('pindex','Admin\RoleController@pindex');
	// 权限添加
	Route::get('padd','Admin\RoleController@padd');
	// 权限添加更新
	Route::post('pdoadd','Admin\RoleController@pdoadd');
	// 权限的修改
	Route::get('pedit/{id}','Admin\RoleController@pedit');
	// 权限修改的处理
	Route::get('pupdate/{id}','Admin\RoleController@pupdate');
	// 权限的删除
	Route::post('pdel/{id}','Admin\RoleController@pdel');




	// 后台用户

	Route::get('/admin/user/create','Admin\UserController@create');
	Route::post('/admin/user/store','Admin\UserController@store');
	Route::get('admin/user/edit/{id}','Admin\UserController@edit');
	Route::post('admin/user/update/{id}','Admin\UserController@update');
	Route::post('admin/user/del/{id}','Admin\UserController@destroy');
	Route::get('role/urole/{id}','Admin\UserController@urole');
	Route::get('admin/user/dourole/{id}','Admin\UserController@dourole');


// });




// Route::get('/role/delete/{id}','RoleController@delete');



// 文章模块
// Route::resource('article','ArticleController');
//菜单路由
//Route::get('/admin/menu/add', 'Admin\MenuController@add');
//Route::post('/admin/menu/insert', 'Admin\MenuController@insert');
//Route::get('/admin/menu/index', 'Admin\MenuController@index');


// >>>>>>> origin/lwx
// // =======
//     	return view('welcome');
// 	});
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

// >>>>>>> blog/lwx

// 前台登录
Route::get('home/hlogin','Home\LoginController@login');
Route::get('home/yzm', 'Home\LoginController@yzm');
Route::get('code/captcha/{tmp}', 'Home\LoginController@captcha');
Route::post('home/dologin', 'Home\LoginController@dologin');
// Route::post('home/dologin', function(){
// 	return 1111;
// });

// 前台显示
// <<<<<<< HEAD
Route::get('home/hindex','Home\BlogController@index');
Route::get('home/zc','Home\BlogController@register');
Route::post('home/dozc','Home\BlogController@doregister');
Route::post('home/uname','Home\BlogController@ajaxuname');
Route::post('home/uphone','Home\BlogController@ajaxuphone');
Route::post('home/uemail','Home\BlogController@ajaxuemail');
Route::post('home/upassword','Home\BlogController@ajaxupassword');
Route::post('home/urepassword','Home\BlogController@ajaxurepassword');
// =======
Route::get('home/hindex','Home\BlogController@index');
// >>>>>>> blog/lwx
