<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
   public function getDeal(Request $request)
   {
   		//创建验证规则
   		$validator = Validator::make($request->all(),[
   			'to'=>'required|exists:users,email',
   			'money'=>'required|numeric',
   			'order_id'=>'required',
   			'info'=>'required',
   			'return_url'=>'required'
   			]);

   		//获取用户的模型
   		$user = User::where('email',$request->input('to'))->first();

   		//解析模版
   		return view('api.deal',[
   			'request'=>$request->all(),
   			'user'=>$user,
   			'url'=>$request->server()['REQUEST_URI']
   			]);
   }
}
