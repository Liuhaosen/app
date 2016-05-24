<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
// use Session;

class CommonController extends Controller
{

    /**
     * 创建验证码
     * @param  [type] $tmp [description]
     * @return [type]      [description]
     */
    public function createVcode()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        // dd($phrase);
        //把内容存入session
        // \Session::flash('milkcaptcha', $phrase);
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
      
    }

    /**
     * [sendMessage description]
     * @return [type] [description]
     */
    public static function sendMessage($to,$message)
    {
        $curl= new \Curl\Curl();
      $url = 'www.xiaohigh.com/sendMessage/index.php?to='.$to.'&code='.$message.'&web=www.haosen.com&class=117';

      $curl->get($url);

      $res = $curl->response;
       
      $result = json_decode($res,true);
     //加true将结果变成数组而不是对象
      if($result['resp']['respCode']=='000000'){
        return true;
      }else{
        return false;
      }
    }

    public function verify(Request $request)
    {
        $code = rand(100000,999999);
        $res = self::sendMessage($request->input('to'),$code);
        session(['vcode'=>$code]);
    }
}
