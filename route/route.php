<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//前台路由
Route::get('/','home/Index/index');
Route::get('goods/list','home/Goods/index');
Route::get('goods/detail','home/Goods/detail');

Route::get('order/cart','home/Order/cart');
Route::post('order/pay','home/Order/pay');
Route::post('order/topay','home/Order/topay');

Route::post('cart/add','home/Order/addCart');
Route::post('cart/del_cart','home/Order/delCart');
Route::get('cart/del_all','home/Order/delAllCart');

//用户头像
Route::get('user/pic','home/Pic/index');
//收货地址
Route::get('user/address','home/Address/index');
Route::get('user/order_list','home/User/orderList');
Route::post('user/query_exp','home/User/queryExp');
Route::get('user/wait_pay','home/User/waitPay');
Route::get('user/back_pay','home/User/backPay');
Route::get('user/pay','home/User/pay');//我的订单－待支付里的支付
Route::get('user/refund','home/User/refund');
Route::post('user/apply_refund','home/User/applyRefund');
Route::any('user/login','home/User/login',['method'=>'get|post']);
Route::any('user/register','home/User/register',['method'=>'get|post']);
Route::get('user/logout','home/User/logout');
Route::post('user/send','home/User/send');
Route::post('user/check_user','home/User/checkUser');
Route::get('user/comment','home/User/comment');
Route::post('user/do_comment','home/User/doComment');


//后台路由
Route::get('admin/login','admin/Admin/index');
Route::post('admin/tologin','admin/Admin/toLogin');
Route::get('admin/logout','admin/Admin/logout');
Route::get('admin/index','admin/Index/index');
Route::resource('admin/system','admin/System');
Route::resource('admin/image','admin/Image');
Route::get('admin/user','admin/User/index');
Route::resource('admin/goods','admin/Goods');
Route::any('admin/search','admin/Goods/search',['method'=>'get|post']);
Route::resource('admin/category','admin/Category');
Route::get('admin/order/index','admin/Order/index');
Route::get('admin/order/express','admin/Order/express');
Route::post('admin/order/do_express','admin/Order/doExpress');
Route::get('admin/order/refund','admin/Order/refund');
Route::get('admin/order/apply_refund','admin/Order/applyRefund');
Route::get('admin/captcha','admin/Admin/captcha');
