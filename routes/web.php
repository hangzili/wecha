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

// Route::get('/','IndexController@index');
// Route::any('/add','IndexController@add');
// Route::any('/del','IndexController@del');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/send', 'UserController@send');
// Route::get('/logout','UserController@logout')->name('logout');



// //前台
// Route::any('/','index\IndexController@index');
// Route::any('/settled_in','index\IndexController@settled_in');
// Route::any('/news_info','index\IndexController@news_info');

// Route::any('/classify','index\ClassifyController@classify');

// Route::any('/shopcart','index\ShopcartController@shopcart');
// Route::any('/cartadd','index\ShopcartController@cartadd');
// Route::any('/order_info2','index\ShopcartController@order_info2');
// Route::any('/numadd','index\ShopcartController@numadd');
// Route::any('/numsub','index\ShopcartController@numsub');
// Route::any('/collection','index\ShopcartController@collection');
// Route::any('/shoucang','index\ShopcartController@shoucang');
// Route::any('/collecdel','index\ShopcartController@collecdel');
// //商品
// Route::any('/pro_info','index\GoodsController@pro_info');
// Route::any('/pro_list','index\GoodsController@pro_list');
// //我的
// Route::any('/mine','index\MineController@mine');
// Route::any('/myburse','index\MineController@myburse');
// Route::any('/all_orders','index\MineController@all_orders');
// Route::any('/record','index\MineController@record');
// Route::any('/address_list','index\MineController@address_list');
// Route::any('/card','index\MineController@card');
// Route::any('/address_edit','index\MineController@address_edit');
// Route::any('/address_adddo','index\MineController@address_adddo');
// Route::any('/address_upda','index\MineController@address_upda');
// Route::any('/address_update','index\MineController@address_update');
// Route::any('/del','index\MineController@del');
// Route::any('/login','index\MineController@login');
// Route::any('/regist','index\MineController@regist');
// Route::any('/registdo','index\MineController@registdo');

// Route::any('/apay', 'index\AlipayController@apay');

// Route::get('/alipay', 'index\AlipayController@index');
// Route::any('/pay', 'index\AlipayController@pay');
// Route::any('/return', 'index\AlipayController@return');

// //后台
// Route::any('/','admina\LoginController@login');
// Route::any('/logindo','admina\LoginController@logindo');
// Route::any('/orderlist','admina\OrderController@orderlist');
// Route::any('/orderx','admina\OrderController@orderx');


// Route::any('/index','admina\IndexController@index');
// Route::any('/main','admina\IndexController@main');
// Route::any('/menu','admina\IndexController@menu');
// Route::any('/top','admina\IndexController@top');

// Route::any('/goods_list','admina\GoodsController@goods_list');
// Route::any('/goods_add','admina\GoodsController@goods_add');
// Route::any('/goods_adddo','admina\GoodsController@goods_adddo');
// Route::any('/cate_list','admina\CateController@cate_list');
// Route::any('/cate_add','admina\CateController@cate_add');
// Route::any('/cate_adddo','admina\CateController@cate_adddo');

Route::any('wechat_access_token','WechaController@wechat_access_token');

Route::any('/user','WechaController@user');
Route::any('/login',function(){
	return view('wecha/login');
});
Route::any('/wecha/login','wecha\LoginController@wecha_login');
Route::any('/wecha/code','wecha\LoginController@wecha_code');
Route::any('/get','WechaController@get');
Route::any('/post','WechaController@post');
Route::any('/label_list','wecha\LabelController@label_list');
Route::any('/label_add','wecha\LabelController@label_add');
Route::any('/label_add_do','wecha\LabelController@label_add_do');
Route::any('/delete','wecha\LabelController@delete');
Route::any('/update','wecha\LabelController@update');
Route::any('/updat_do','wecha\LabelController@updat_do');
Route::any('/wechat','wecha\LabelController@wechat');
Route::any('/add_user_tag','wecha\LabelController@add_user_tag');
Route::any('/add_user_list','wecha\LabelController@add_user_list');


//log
Route::any('/event','EventController@event');
//素材传

Route::any('/wecha/upload','ResourceController@upload');
Route::any('/wecha/do_upload','ResourceController@do_upload');
Route::any('/wecha/source_list','ResourceController@source_list');

//自定义菜单
Route::any('/wecha/menu','ResourceController@menu');
Route::any('/wecha/menulist','MenuController@craete_menu');
Route::any('/wecha/menuabc','MenuController@menuabc');

Route::get('/wechat/menu_list','MenuController@menu_list'); //菜单列表
Route::post('/wechat/create_menu','MenuController@create_menu'); //菜单
Route::get('/wechat/load_menu','MenuController@load_menu'); //刷新菜单
