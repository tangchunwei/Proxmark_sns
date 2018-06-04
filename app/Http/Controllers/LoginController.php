<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Question;
use Hash;
use DB;

class LoginController extends Controller
{
    //显示登录表单
    public function login(){
        $questions=Question::getQuestions();
        return view('login',[
            'questions'=>$questions,
        ]);
    }
    // 处理登录表单的方法
    public function dologin(LoginRequest $req) {
                    // 先通过手机号到数据库中查询用户的信息
                    // select * from users where mobile=$req->mobile limit 1
                    $user = User::where('mobile',$req->mobile)->first();

                    // 判断是否是机器人
                    if($user)
                    {
                        //判断回答的问题答案是否正确
                        $data= DB::table('question')->select('answer')
                            ->where('answer',$req->answer)
                            ->get()
                            ->isEmpty();
                          if($data){
                              // 回答错误
                              return back()->withErrors('回答错误！');
                          }
                        // 判断密码
                        // 表单中的密码：$req->password   （原始）
                        // 数据库的密码：$user->password （哈希之后 ）
                        // laravel中 Hash::check(原始，哈希之后)判断是否一致

                        if(  Hash::check(  $req->password   ,   $user->password   )  )
                        {
                            // 把用户常用的数据保存到SESSION（标记一下、打卡）
                            session([
                                'id' => $user->id,
                                'mobile' => $user->mobile,
                                'name' => $user->name,
                                'email' => $user->email,
                            ]);
                            // 跳转
                            return redirect()->route('index.index');
                        }
                        else
                        {
                            // 密码错误
                            return back()->withErrors('密码错误！');
                        }
                    }
                    else
                    {
                        // 账号不存在
                        // 返回上一个页面，并把错误信保存到SESSION中，返回，在下一个页面中就可以使用 $errors 获取这个错误信息了w
                        return back()->withErrors('手机号不存在！');
                    }
    }
    //退出登录
    public function logout(Request $req) {

                    //  清空SESSION
                    $req->session()->flush();


                    return redirect()->route('index.index');
    }



}
