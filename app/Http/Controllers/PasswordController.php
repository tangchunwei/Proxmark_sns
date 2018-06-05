<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use DB;
use Hash;

class PasswordController extends Controller
{
    //修改密码
    public function changepwd(PasswordRequest $req){
                $users = DB::table('users')
                                ->where('id', '=', session('id'))
                                ->first();
                //判断用户输入的密码与数据库的密码是否一致
                // 表单中的密码：$req->password   （原始）
                // 数据库的密码：$user->password （哈希之后 ）
                // laravel中 Hash::check(原始，哈希之后)判断是否一致
                if(  Hash::check(  $req->oldpass   ,   $users->password   )  ){
                    //更新密码并且保存
                    DB::table('users')
                        ->where('id', session('id'))
                        ->update(['password' => Hash::make($req->password)]);
                    // 跳转到 登录页
                    return redirect()->route('login');
                }else{
                    return back()->withErrors(['oldpass'=>'密码不正确！']);
                }

    }
}
