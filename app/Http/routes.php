<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

				//后台

//路由是转发请求用的

Route::group(['middleware'=>'login'],function(){
//后台首页显示
Route::get('/admin','AdminController@index');

//后台用户管理

Route::controller('/admin/user','UserController');

//后台分页管理
Route::controller('/admin/cate','CateController');

//后台文章管理
Route::controller('/admin/article','ArticleController');
});


//后台登录管理
Route::get('/admin/login','LoginController@login');
Route::post('/admin/login','LoginController@dologin');



					//前台

//前台登录管理
Route::get('/login','LoginController@flogin');
Route::post('/login','LoginController@dlogin');

//前台注册管理
Route::get('/register','LoginController@register');
Route::post('/register','LoginController@doregister');

//显示验证码
Route::get('/vcode','CommonController@createVcode');

//发送邮件
Route::get('/send','LoginController@sendActive');

//邮箱激活
Route::get('/active','LoginController@active');

//忘记密码操作
Route::get('/forget','LoginController@forget');
Route::post('/forget','LoginController@find');

//重置密码
Route::get('/reset','LoginController@reset');
Route::post('/reset','LoginController@doreset');

//发送邮件
Route::get('/message','CommonController@sendmessage');
Route::get('/verify','CommonController@verify');

//前台博客首页显示页面
// Route::get('/article/show','ArticleController@show');
// haosen.com/post-1
Route::get('post-{id}','ArticleController@show');
Route::post('post-{id}','ArticleController@show');

//文章的列表显示
Route::get('list','ArticleController@listShow');

//评论添加
Route::post('/comment/insert','CommentController@insert')->middleware('flogin');


// Route::get('/aaa',function(){
// 	// phpinfo();
// 	dd('2222');
// 	$curl = new Curl\Curl();
// 	$curl->get('http://www.baidu.com/');

// 	dd($curl->response);
// });//




