<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'username'=>'required|alpha_dash|between:4,16',
            'password'=>'required|between:6,20'
        ];
    }

    public function messages()
    {
        return[
            'username.required'=>'用户名不能为空',
            'username.alpha_dash'=>'用户名格式错误',
            'username.between'=>'用户名长度有误',
            'password.required'=>'密码不能为空',
            'password.between'=>'密码长度有误'
        ];
    }
}
