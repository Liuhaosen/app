<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ResetRequest extends Request
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
            'password'=>'required|regex:'.config('app.rules.password'),
            'repassword'=>'required|same:password',
            'token'=>'required'
        ];
    }

    /**
     * 验证规则的解释
     */
    public function messages()
    {
        return [
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'确认密码与密码不一致',
            'token.required'=>'非法请求'
            
        ];
    }
}
