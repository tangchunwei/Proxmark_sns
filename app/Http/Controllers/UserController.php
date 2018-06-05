<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\User;
use DB;

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
        public  function changemessage(MessageRequest $req){
            $email=$req->email;
            $name=$req->name;
            $sex=$req->sex;
            $city=$req->city;
            $signature=$req->signature;
            if(session('id')){
                //修改用户信息
                DB::table('users')
                    ->where('id', session('id'))
                    ->update([
                        'email' => $email,
                        'name' => $name,
                        'sex' => $sex,
                        'city' => $city,
                        'signature' => $signature,
                    ]);
               //更新session
                session([
                    'email' => $email,
                    'name' => $name,
                    'sex' => $sex,
                    'city' => $city,
                    'signature' => $signature,
                ]);
                // 跳转
                return redirect()->route('user.set');
            }else{
                return back()->withErrors(['name'=>'请先登录！']);
            }
        }
}
