<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * 评论插入操作
     */
    
    public function insert(Request $request)
    {

       
        //获取提交的信息 拼接数据
        $data = $request->only('article_id','content');
        $data['user_id'] = session('id');
        
        if(DB::table('comments')->insert($data)){
            return back()->with('info','评论成功');
        }else{
            return back()->with('error','评论失败');
        }
       
    }
}
