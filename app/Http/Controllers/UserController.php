<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\User;
use DB;
use App\Models\Discuss;
use App\Models\Collection;

class UserController extends Controller
{
        //显示个人设置界面
        public function set(){
            $data = User::where('id',session('id'))
                ->first();
            return view('user.set',[
                'data'=>$data,
            ]);
        }
        //显示个人主页界面
        public function home($id){
            //查询最近的提问
            $data = DB::table('ties')
                        ->where('user_id', '=', $id)
                        ->orderby('is_jing','desc')
                        ->take(20)
                        ->get();
            //查询最近的回答
            $reanswer = Discuss::where('user_id',$id)
                ->with('tie')
                ->take(15)
                ->get();
            $user=User::where('id',$id)
                ->first();
            return view('user.home',[
                'data'=>$data,
                'reanswer'=>$reanswer,
                'user'=>$user,
            ]);
        }
        //显示用户中心界面
        public function userIndex(){
            //查询用户发表的帖子
            $data = DB::table('ties')
                ->where('user_id', '=', session('id'))
                ->orderby('id','desc')
                ->get();
            //查询用户收藏的帖子
            $Collection = Collection::where('user_id',session('id'))
                ->with('tie')
                ->orderby('id','desc')
                ->get();
            return view('user.index',[
                'data'=>$data,
                'Collection'=>$Collection,
            ]);
        }
        //显示用户信息界面
        public function message(){

            $user = User::find(session('id'));
            $name = $user->name;
            $str = "@".$name;
            $replys = Discuss::where('content','like','%'.$str.'%')
                                ->with('user')
                                ->with('tie')
                                ->paginate(3);

            return view('user.message',['replys'=>$replys]);
        }

        // 删除回复
        public function rpy_del(Request $req){
            
            $reply = Discuss::find($req->id);
            $reply->delete();

            return back();
        }

        //显示用户邮箱激活界面
        public function activate(){
            // 显示用户信息到界面
            $data = User::where('id',session('id'))
                ->first();
            return view('user.activate',[
                'data'=>$data,
            ]);
        }

        public  function changemessage(MessageRequest $req){
            $email=$req->email;
            $data = User::where('id',session('id'))
                            ->first();
            if($data->email==$email&&$data->verified!=0 ){
                $verified="1";
            }else{
                $verified="0";
            }

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
                        'verified'=>$verified,
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
