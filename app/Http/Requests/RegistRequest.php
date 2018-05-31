<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'protocol'=>'accepted',  // 注册协议必须勾选
            'mobile'=>[
                'required',
               //'regex:/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/',  // 正则表达式判断手机 号格式
                'unique:users,mobile',  // 向users表中的mobile字段中找是否这个手机 号已经存在 ，如果存在 就报错
            ],
            'password'=>'required|min:6|max:18|confirmed',   // confirmed:   password  和  password_confirmation是否相同
        ];
    }
}
