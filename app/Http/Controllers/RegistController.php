<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flc\Dysms\Client;
use App\Models\User;
use Hash;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\RegistRequest;
use Illuminate\Support\Facades\Mail;
use DB;



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
                $user->verification_token=$password;
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
    //发送邮件激活
    public function verification(Request $req){
            $email=$req->email;
            $name="test";
            $uid="111";
            $code="21212";
            $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
            $flag=Mail::send('user.mail', $data, function($message) use($data)
            {
                $message->to($data['email'], $data['name'])->subject('Proxmark3社区激活邮件');
            });
                    if(!$flag){

                        header("refresh:3;url=/set");
                        print('发送邮件成功<br>三秒后自动跳转。');

                    }else{
                        header("refresh:3;url=/set");
                        print('发送邮件失败，请重试！<br>三秒后自动跳转。');

                    }
        }
    //检测邮件是否激活
    public function checkverification(Request $req){
        $token=$req->token;
        $email=$req->email;
        $checkemail = User::where('email',$email)
                        ->first();
        if($token&&$checkemail!=null){
            if($checkemail->verification_token==$token){
                DB::table('users')
                    ->where('email',$email)
                    ->update([
                        'verified' => "1",
                    ]);
                header("refresh:3;url=/set");
                print('邮箱激活成功耶耶耶<br>三秒后自动跳转。');
            }else{
                header("refresh:3;url=/set");
                print('邮箱激活失败23333333333333,请重新激活<br>三秒后自动跳转。');
            }
        }else{
            header("refresh:3;url=/set");
            print('路径不对<br>三秒后自动跳转。');
        }


    }
}
