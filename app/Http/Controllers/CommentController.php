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

        // dd($request->all());
        //插入
        $data =  $request->all();
        DB::table('comments')->insert();
    }
}
