<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'email'=>'required|email',
            'password'=>'required|regex:/^\S{6,18}$/',
            'repassword'=>'required|same:password',
            'vcode'=>'required'
        ];
    }

    /**
     * 验证规则的解释
     */
    public function messages()
    {
        return [
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'确认密码与密码不一致',
            'vcode.required'=>'请填写验证码'
        ];
    }
}