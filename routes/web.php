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
//后台默认显示页面
Route::get('admin','admin\IndexController@Index');

//后台用户添加
Route::get('admin/users/create','admin\UsersController@create');

Route::post('admin/users/store','admin\UsersController@store');
//后台默认显示页面
Route::get('/admin/users/index','admin\UsersController@index');
//后台修改数据
Route::get('/admin/users/edit/{id}','admin\UsersController@edit');
Route::PUT('/admin/users/update/{id}','admin\UsersController@update');

// 后台删除
Route::post('/admin/users/destroy/{id}','admin\UsersController@destroy');


// 链接管理
// 添加链接
Route::get('/admin/link/create','admin\LinkController@create');
Route::post('/admin/link/store','admin\LinkController@store');

// 链接列表
Route::get('/admin/link/index','admin\LinkController@index');
// 链接修改
Route::get('/admin/link/edit/{id}','admin\LinkController@edit');
Route::post('/admin/link/update/{id}','admin\LinkController@update');
// 删除友情链接
Route::post('/admin/link/destroy/{id}','admin\LinkController@destroy');

// 前台首页
Route::get('home/index/index','home\IndexController@index');
//前台登录
Route::get('home/login/login','home\LoginController@login');
Route::get('home/login/dologin','home\LoginController@dologin');
// 前台注册
Route::get('home/login/regist','home\LoginController@regist');
// 前台列表页
Route::get('home/cates/index','home\CatesController@index');
// 我的关注
Route::get('home/concern/index','home\ManageController@index');
// 意见反馈
Route::get('home/concern/complaint','home\ManageController@complaint');
//后台登录
Route::get('admin/login','admin\LoginController@login');
