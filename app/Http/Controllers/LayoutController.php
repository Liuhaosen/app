<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CateController;
class LayoutController extends Controller
{
    /**
     * 创建和显示页面头部信息
     */
    public static function header()
    {
        //获取数据
        $allCates = CateController::getCatesByPid(0);
        //解析模版
        return view('layout.header',['allCates'=>$allCates]);
    }

    /**
     * 创建和显示商品页面头部
     */
     public static function goodsHeader()
    {
        //获取数据
        $allCates = CateController::getCatesByPid(0);
        //解析模版
        return view('layout.goodsHeader',['allCates'=>$allCates]);
    }

    /**
     * 创建和显示文章页面侧边栏信息
     */
    
    public static function articleSlider()
    {
            //获取数据
             
            $recs = DB::table('articles')->where('rec',1)->orderBy('id','desc')->limit(5)->get();
            $cates= CateController::getTopCate();
            $recent=DB::table('articles')->orderBy('id','desc')->limit(5)->get();

            return view('layout.articleSlider',[
                    'recs'=>$recs,
                    'cates'=>$cates,
                    'recent'=>$recent
                ]);

    }

    /**
     * 创建和显示商品信息的侧边栏
     * @return [type] [description]
     */
    public static function goodsSlider()
    {
            //获取数据
             //热门
            $recs = DB::table('goods')->orderBy('kucun','asc')->limit(5)->get();

            $cates= CateController::getTopCate();
           //最新
            $recent=DB::table('goods')->orderBy('id','desc')->limit(5)->get();

            return view('layout.goodsSlider',[
                    'recs'=>$recs,
                    'cates'=>$cates,
                    'recent'=>$recent
                ]);

    }
}
