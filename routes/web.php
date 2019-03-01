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
