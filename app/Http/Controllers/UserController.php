<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
        //显示个人设置界面
        public function set(){
            return view('user.set');
        }
        //显示个人主页界面
        public function home(){
            return view('user.home');
        }
        //显示用户中心界面
        public function userIndex(){
            return view('user.index');
        }
        //显示用户信息界面
        public function message(){
            return view('user.message');
        }
        //显示用户邮箱激活界面
        public function activate(){
            return view('user.activate');
        }
}
