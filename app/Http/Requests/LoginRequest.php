<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'mobile'=>[
                'required',
//                'regex:/13[123569]{1}\d{8}|15[1235689]\d{8}|188\d{8}/',  // 正则表达式判断手机 号格式
            ],
            'password'=>'required|min:6|max:18',
        ];
    }
}
