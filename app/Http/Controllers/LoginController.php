<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use DB;
use Mail;
use Crypt;
use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\FloginRequest;
use App\Http\Controllers\CommonController;

class LoginController extends Controller
{
      /**
       * 用户的后台登录页面显示
       */
      public function Login()
      {

            return view('admin.login');

      }

      /**
       * 用户的后台登录操作
       */
      public function doLogin(LoginRequest $request)
      {
           // dd($request->all());  
           //获取用户信息
           $user = DB::table('users')->where('username',$request->input('username'))->first();

           // dd($user);  
           //检测密码是否一致   检测本次传过来的字符串密码和数据库里的哈希加密密码是否一致
           if(Hash::check($request->input('password'),$user->password)){
               //密码一致就可以成功登录,写入session
               session(['id'=>$user->id]);
               // dd(session());
                //记住我 操作
               if($request->input('remem')){

                    //判断为真,获取用户名和密码,做加密操作
                    $str = $requset->input('username').'|'.$request->input('password');
                    //加密
                    $auth_user = Crypt::encrypt($str);

                    //写入cookie
                    \Cookie::queue('auth_user',$auth_user,30);
                   
               }
               return redirect('/admin')->with('success','登录成功');
           }else{
                return back()->with('error','密码错误');
           }

          }
           



        /**
         * 用户的前台注册页面显示
         *
         */
        
        public function register()  //记得加表单验证
        {
            return view('login.register');//访问login下的register.blade.php
            
        }    

        /**
         * 用户的前台注册过程
         */
        public function doregister(RegisterRequest $request)
        {

            //检测验证码
            $code = $request->input('vcode');
            //判断
            if($code!=session('vcode')){
                return back()->with('error','验证码不正确');  
             }
            //执行插入操作
            // dd($request->all());
            $data = $request->only(['email','password']);

            $data['password']= Hash::make($data['password']);
            //执行插入
            $data['token'] = str_random(50);//生成一个五十位的随机字符串
            //匹配数据库里的email和填写的email是否相同,如果相同则提醒已存在,如果不同才执行邮件发送操作
            $email = DB::table('users')->where('email',$request->input('email'))->first();
            if(!$email) {
             if($id = DB::table('users')->insertGetId($data)){    
                //给用户发送邮件
                
                $this->sendActive($data['email'],$id,$data['token']); 
                 return view('login.success');           
             }else{
                 return bakc()->with('error','注册失败,请联系管理员');
             }  
            }else{
                return back()->with('error','该邮箱已经注册');
            } 
        }

        /**
         * 向用户发送激活邮件
         */
        private function sendActive($email,$id,$token)
        {
            // Mail::raw('恭喜您注册成功,请点击链接完成激活　<a href="http://haosen.com/active?'.$id.'&token='.$token.'">激活</a>',function($message)use($email){

            //     $message->subject('注册成功提醒邮件');
            //     $message->to('919801928@qq.com');
            // });//发送raw原生字符,该方法会将a标签显示在网页中

            //将模版解析 并且发送邮件  //这里的邮箱应该是$email,暂时写死是为了接收邮件.
            
                Mail::send('email.active',['email'=>'sen0801@163.com','id'=>$id,'token'=>$token], function ($message) use ($email) {
                  
                    $message->to($email)->subject('注册成功提醒邮件');
                });
                
        }

        public function send()
        {
             Mail::raw('恭喜您注册成功',function($message){
                $message->subject('提醒邮件');
                $message->to('sen0801@163.com');
            });
        }
      
      /**
       * 激活注册用户
       */
        
        public function active(Request $request)
        {
            //获取id
            $id = $request->input('id');
            //读取数据库
            $data = DB::table('users')->where('id',$id)->first();
            //进行比对
            if($request->input('token')==$data->token){
                $tmp['status']=2;

                if(DB::table('users')->where('id',$id)->update($tmp)){
                    $this->resetToken($id);
                    // echo 'ok';die;
                    return redirect('/')->with('success','激活成功');
                }else{
                    // echo 'fail';die;
                    return redirect('/')->with('error','激活失败');
                }
            }
            // echo 'fail';die;
                    return redirect('/')->with('error','激活失败');
        }


        /**
         * 重置用户密钥
         */
        private function resetToken($id)
        {
            DB::table('users')->where('id',$id)->update([
                'token'=>str_random(50)
                ]);

        }

        /**
         * 前台登录页面
         */
        public function flogin()
        {   
            return view('login.login');
        }

        /**
         * 前台的登录操作
         */
        public function dlogin(FloginRequest $request)
        {
            $url = $request->input('redirect','/login');
            // dd($request->all());
            //检测验证码
            if($request->input('vcode')!= session('vcode'))
            {
                return back()->with('error','验证码填写不正确');
            }
            //获取传过来的数据,匹配成功后存入session,然后跳转
            $data = DB::table('users')->where('email',$request->input('email'))->first();

            //检测邮箱和密码是否匹配
            if($request->input('email')!=$data->email){
                return back()->with('error','邮箱不正确');
            }
            if(Hash::check($request->input('password'),$data->password)){
                 session(['id'=>$data->id]);
                return redirect($url);
            }else{
                return back()->with('error','密码错误,请重新输入');
            }
        

            
        }

        /**
         * 找回密码页面
         */
        
        public function forget()
        {
            return view('login.forget');
        }

        /**
         * 找回密码的操作
         */
        public function find(EmailRequest $request)
        {
           $data = DB::table('users')->where('email',$request->input('email'))->first();
           if($data){
           //发送邮件找回
           $this->sendFind($data->email,$data->id,$data->token);
         }
        }

        /**
         * 向用户发送找回密码的邮件
         */
        
        private function sendFind($email,$id,$token)
        {   

              Mail::send('email.find',['email'=>$email,'id'=>$id,'token'=>$token], function ($message) use ($email) {
                  
                    $message->to($email)->subject('重置密码邮件');
                });
              return redirect('/login')->with('info','邮件已经发送,请到邮箱查看并进行重置操作');
        }


        /**
         * 重置密码的页面显示
         */
        public function reset(Request $request)
        {
            //获取id和token
            $user = DB::table('users')->where('id',$request->input('id'))->first();
            if(empty($user)){
                return redirect('/');
            }
            if($user->token ===$request->input('token')){
                
                return view('login.reset',['user'=>$user]);
            }

             
        }

    

        /**
         * 重置密码的操作
         */
        public function doReset(ResetRequest $request)
        {
               //加密密码
            $data['password'] = Hash::make($request->input('password'));
            $data['token'] = str_random(50);
            //更新
            if(DB::table('users')->where('id',$request->input('id'))->update($data)){
                return redirect('/')->with('info','登录成功');
            }else{
                return back()->with('error','重置失败');
            }
        }

    
}





// http://haosen.com/reset?id=4&token=faV1pJr8Hs90ikClYJOaY2br5u33t6Vuvb2xhTYitwbxIKPX1b