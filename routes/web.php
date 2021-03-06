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
//后台登录   (本人一部分开始)
Route::get('admin/login','admin\LoginController@login');
Route::post('admin/login/dologin','admin\LoginController@dologin');
// 退出登录
Route::get('admin/login/logout','admin\LoginController@logout');


// 后台默认页面和用户管理
Route::group(['middleware'=>'login'],function(){

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

	// 后台用户删除
	Route::post('/admin/users/destroy/{id}','admin\UsersController@destroy');

});

// 后台商城管理
Route::group(['middleware'=>'login'],function(){

	//商品路由
	Route::get('/goods','admin\GoodsController@index');
	Route::resource('goods','admin\GoodsController');
});

// 后台类别管理
Route::group(['middleware'=>'login'],function(){

	//类别路由
	Route::get('/cates/create/{id}','admin\CatesController@create');
	Route::resource('cates','admin\CatesController');
});

// 后台 轮播图管理  推荐位管理 网站配置管理 意见箱管理
Route::group(['middleware'=>'login'],function(){

	//轮播图管理
	Route::resource('lbts','admin\LbtsController');
	//推荐位管理
	Route::resource('tjws','admin\TjwController');
	//网站配置管理
	Route::resource('sets','admin\SetsController');
	//意见箱管理
	 Route::get('/admin/advices/reback','admin\AdvicesController@edit');
	 Route::resource('admin/advices','admin\AdvicesController');
});
// 后台友情链接
Route::group(['middleware'=>'login'],function(){

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
});


// 佳旗前台路由

// 前台首页
Route::get('/home/index/index','home\IndexController@index');
//前台登录
Route::get('home/login/login','home\LoginController@login');
Route::post('home/login/dologin','home\LoginController@dologin');
Route::post('home/login/code','home\LoginController@code');
// 前台退出
Route::get('home/login/logout','home\LoginController@logout');

// 前台注册
Route::get('home/login/regist','home\LoginController@regist');
// 前台列表页
Route::get('home/cates/index/{id}','home\CatesController@index');
Route::get('home/cates/create','home\CatesController@create');
// 我的关注
Route::get('/home/concern/index','home\ManageController@index');
Route::get('/home/concern/create/{id}','home\ManageController@create');
Route::get('/home/concern/destroy/{id}','home\ManageController@destroy');

// 意见反馈
Route::get('home/advices/index','home\AdvicesController@index');
Route::post('home/advices/store','home\AdvicesController@store');

// 前台详情页   本人二次
Route::get('home/goods/detail/{id}','home\GoodsController@detail');
// 加入到购物车
Route::get('home/cart/car','home\CartController@car');
Route::get('home/cart/goodsUpdate','home\CartController@goodsUpdate');



//浏览购物车
Route::get('home/goods/addcar','home\CartController@addcar');
Route::get('home/goods/index','home\GoodsController@index');
Route::get('home/cart/destroy','home\CartController@destroy');


//  中间件  判断有没有登录
Route::group(['middleware'=>'orders'],function(){

	// 确认信息页
	Route::get('home/cart/orders','home\CartController@orders');
});

Route::get('home/cart/qry','home\CartController@qry');


	// 我的订单
	Route::get('home/orders/index','home\OrdersController@index');

// 删除订单
Route::get('home/orders/del/{oid}','home\OrdersController@del');

//刘伟翰 路由
//前台 排行榜
Route::resource('phb','home\PhbController');
//前台 购物攻略-文章浏览
Route::get('/article','home\ArtController@index');
//前台 个人信息
Route::get('/users/index/{id}','home\UsersController@index');
//前台 个人信息修改
Route::post('/users/update/{id}','home\UsersController@update');
//后台 排行榜管理 列表显示
Route::resource('admin/phb','admin\PhbController');
//后台 排行榜修改
Route::get('/admin/phb/edit/{id}','admin\PhbController@edit');
Route::post('/admin/phb/update/{id}','admin\PhbController@update');
//后台 购物攻略-文章管理
Route::resource('/admin/art','admin\ArtController');
//后台 购物攻略-文章添加
Route::get('/admin/art/create','admin\ArtController@create');
Route::post('/admin/art/store','admin\ArtController@store');
//后台 购物攻略-文章修改
Route::get('/admin/art/edit/{id}','admin\ArtController@edit');
Route::post('/admin/art/update/{id}','admin\ArtController@update');
//后台 购物攻略-文章删除
Route::get('/admin/art/destroy/{id}','admin\ArtController@destroy');
//后台 订单管理-查询
Route::resource('admin/orders','admin\OrdersController');
//后台 订单管理-修改订单信息
Route::get('/admin/orders/edit/{id}','admin\OrdersController@edit');
Route::post('/admin/orders/update/{id}','admin\OrdersController@update');



 //手机注册验证
 Route::get('/home/login/phone/{id}','home\registsController@phone');
 Route::post('/home/login/uname','home\registsController@update');
 //获取邮箱
 Route::post('/home/login/email','home\registsController@create');
 //修改密码
 Route::get('/home/login/updateupwd','home\registsController@show');
 Route::post('/home/login/edit','home\registsController@edit');
//注册资源路由器
 Route::resource('/home/login/regist','home\registsController');

