<?php

// 显示主页
Route::get('/','IndexController@index');

// 发表新帖
Route::get('/tie_add','TieController@add')->name('tie_add');
Route::post('/tie_doadd','TieController@doadd')->name('tie_doadd');

// 帖子列表
Route::get('/tie_list/{type}/{is_jing}','IndexController@tie_list')->name('tie_list');
