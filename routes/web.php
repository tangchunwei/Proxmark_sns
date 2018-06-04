<?php

// 显示主页
Route::get('/','IndexController@index')->name('index.index');


//显示个人设置界面
Route::get('/set','UserController@set')->name('user.set');
//显示个人主页界面
Route::get('/home','UserController@home')->name('user.home');
//显示用户中心界面
Route::get('/userIndex','UserController@userIndex')->name('user.index');
//显示用户信息界面
Route::get('/message','UserController@message')->name('user.message');
//显示用户邮箱激活界面
Route::get('/activate','UserController@activate')->name('user.activate');
//修改头像
Route::post("/face",'FaceController@face')->name('setface');

// 发表新帖
Route::get('/tie_add','TieController@add')->name('tie_add');
Route::post('/tie_doadd','TieController@doadd')->name('tie_doadd');

// 帖子列表
Route::get('/tie_list/{type}/{is_jing}','IndexController@tie_list')->name('tie_list');

// 显示注册表单
Route::get('/regist', 'RegistController@regist')->name('regist');
// 处理注册表单
Route::post('/regist', 'RegistController@doregist')->name('doregist');
//发送短信验证码
Route::get('/sendmobilecode', 'RegistController@sendmobilecode')->name('ajax-send-modbile-code');


// 显示登录表单
Route::get('/login', 'LoginController@login')->name('login');
// 处理登录表单
Route::post('/login', 'LoginController@dologin')->name('dologin');
//退出登录
// 退出
Route::get('/logout', 'LoginController@logout')->name('logout');

