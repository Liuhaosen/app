<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   /**
    * 后台用户的添加页面显示
    * admin/user/add
    */
   public function getAdd()
   {
        return view('user.add');
   }

   /**
    * 声明添加方法
    */
   public function postInsert(Request $request)
   {    
    //手动验证
        // if(!$request->input('username')){
        //     return back()->with('error','用户名不能为空');
        // }
        
        //laravel内置的表单验证 
        //validate传递三个参数,第一个是传递过来的请求对象,第二个参数是请求规则,第三个参数是对请求规则做对应的翻译或解释.
        $this->validate($request,[
            'username'=>'required',//当前要检测的字段
            'password'=>'required',
            'repassword'=>'required|same:password',//确认密码不能为空,且需要和密码一致
            'email'=>'required|email',

        ],[
            'username.required'=>'用户名字段不能为空',//对内置请求规则的解释,翻译
            'password.required'=>'密码不能为空',
            'repassword.required'=>'确认密码不能为空',
            'repassword.same'=>'两次密码不一致',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确'
        ]);

        //执行数据库的添加操作
        //拼接参数
        // $data['username'] = $request->input('username');
        
        //提取部分参数
        $data = $request->only(['username','password','email']);
       // dd($data);
        $data['password'] = Hash::make($data['password']);
        $data['token'] = str_random(50);//生成一个50位的随机字符串
        $email = DB::table('users')->where('email',$request->input('email'))->first();
        if($email){
            return back()->with('error','邮箱已经存在');
        }else{
        $res = DB::table('users')->insert($data);
            if($res){
                //如果成功
                return redirect('admin/user/index')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }

   }
   }

    /**
     * 用户列表页
     */
    public function getIndex(Request $request)
    {
       //先读取用户信息并且分页
       if($request->input('unsername')){
       $users = DB::table('users')
       ->where('username','like','%'.$request->input('username').'%')
       ->paginate($request->input('num',10));
   }else{
         $users = DB::table('users')
         ->paginate($request->input('num',10));
   }

   $users = DB::table('users')
        ->where(function($query) use ($request){
            $query->where('username','like','%'.$request->input('keywords').'%');
        })
        ->paginate($request->input('num',10));

       //分配到模板,执行显示
       return view('user.index',['users'=>$users,'request'=>$request->all()]);
    }

    /**
     * 用户的修改
     */
    public function getEdit($id)
    {
        //读取数据库
        $res = DB::table('users')->where('id',$id)->first();
        // dd($res);
        //显示模板
        return view('user.edit',['userInfo'=>$res]);
    }

    /*
     *用户的更新操作
     */
    public function postUpdate(Request $request)
    {

         $this->validate($request,[
            'username'=>'required',//当前要检测的字段
            'email'=>'required|email',

        ],[
            'username.required'=>'用户名字段不能为空',//对内置请求规则的解释,翻译
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确'
        ]);

        //获取参数
        $data = $request->only('username','email');

        //更新
        $res = DB::table('users')->where('id','=',$request->input('id'))->update($data);

        //判断
        if($res){
          
            return redirect('/admin/user/index')->with('success','更新成功');
        }else{
            return back()->with('error','更新失败');
        }
    }


   
    
}
