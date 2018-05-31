<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flc\Dysms\Client;
use App\Models\User;
use Hash;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\RegistRequest;



class RegistController extends Controller
{
    //显示注册界面
    public function regist(){
        return view('regist');
    }
    //用户注册
    public function doregist(RegistRequest $req){
                // 拼出缓存的名字
                $name = 'code-'.$req->mobile;
                // 再根据名字取出验证码
                $code = Cache::get($name);
                if(!$code || $code != $req->mobile_code)
                {
                    return back()->withErrors(['mobile_code'=>'验证码错误！']);
                }

                // 密码加密
                $password = Hash::make($req->password);
                // 创建一个user对象
                $user = new User;
                // 把表单中的手机号设置到 模型
                $user->mobile = $req->mobile;
                // 把加密 之后的密码设置到模型
                $user->password = $password;
                //把用户名保存到表中
                 $user->name = $req->username;
                // 保存到表中
                $user->save();

                // 跳转到 登录页
                return redirect()->route('login');
    }
    // 发送短信
    public function sendmobilecode(Request $req) {
        // 生成6位随机数
        $code = rand(100000,999999);
        // 缓存时的名字
        $name = 'code-'.$req->mobile;  // code-1367777888
        // 把随机数缓存起来（1分钟）
        Cache::put($name, $code, 5);
              // 发短信
                $config = [
                    'accessKeyId'    => 'LTAIfGI6uvRzJ1gJ',
                    'accessKeySecret' => '8sJjVNXak3PqlloVr2LoReaqKpGMm4',
                ];
                $client  = new Client($config);
                $sendSms = new SendSms;
                $sendSms->setPhoneNumbers($req->mobile);
                $sendSms->setSignName('全栈1SNS项目');
                $sendSms->setTemplateCode('SMS_128890229');
                $sendSms->setTemplateParam(['code' => $code]);
                // 发送
                $client->execute($sendSms);
    }
}
