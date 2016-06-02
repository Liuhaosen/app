<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{

    /**
     * 缓存所有的分类信息
     */
    public static function catchCates()
    {
        // Cache:set('cates',self::getCates());
        
    }


    /**
     * 获取表中的所有的分类
     */
    public static function getAllCate()
    {
        return DB::table('cates')->get();
    }

    /**
     * 递归方式获取脚本里的数据,而不是从数据库里读取,这样发送请求的次数将减少,节省时间与资源
     */
    // public static function getCatesByPidArr($cates,$pid)
    // {
    //     $data = [];
    //     foreach($cates as $k =>$v){
    //         if($v->pid==$pid){
    //             $v->sub = self::getCatesByPidArr($cates,$v->id);
    //             $data[] = $v;
    //         }
    //     }
    //     return $data;
    // }

    // /**
    //  * 获取所有的分类
    //  */
    // public function getCates()
    // {
    //     $arr = self::getAllCate();
    //     //通过父级id来获取子集元素
    //     $res = self::getCatesByPidArr($arr,0);
    //     return $res;
    // }


    /**
     * 递归方式来获取分类
     */
    public static function getCatesByPid($pid)
    {
        //读取数据库  通过一个$pid,获取pid等于传过来的$pid的所有数据,也就是获取了id=pid的父级类下的所有数据
        $res = DB::table('cates')->where('pid','=',$pid)->get();
         // dd($res);
        //遍历
        $data = [];
        foreach($res as $k => $v){
          
            $v->subs = self::getCatesByPid($v->id);//$v下的sub里压入数据,数据是父id等于当前获得数据的id的所有分类.
            $data[] = $v;
             
        }
       return $data;   
     }


    /**
     * 获取分类下所有的分类,按照顺序来获取
     */
    
    public static function getCates()
    {
        $res = DB::table('cates')
        ->select(DB::raw('*,concat(path,",",id) as paths'))
        ->orderBy('paths')
        ->get();
        
        //调整分类名称 衬衣=>   |-----衬衣
        foreach ($res as $k => $v) {
           //将path拆分
           $tmp = explode(',',$v->paths);
           $len = count($tmp)-1;//长度-1就相当于逗号的数量,也就是层级的数量
           //修改分类的名称
            $res[$k]->name = str_repeat('|------',$len-1).$v->name;
        }
       
       return $res;
    }




     /**
      * 分类的添加页面显示
      */
     
     public function getAdd($id='')
     {
        // dd($id);
        $cates = self::getCates();
        // dd($cates);
        // $cates = DB::table('cates')->get();
        //显示一个form表单
        return view('cate.add',['cates'=>$cates,'id'=>$id]);

     }

     /**
      * 分类的插入操作
      */
     
     public function postInsert(Request $request)
     {
         $this->validate($request,[
            'name'=>'required',//当前要检测的字段
        ],[
            'name.required'=>'分类名不能为空',
        ]);


        $data = array();
        $pid = $request->input('pid');
        $data = $request->except('_token');
        //判断,如果是顶级分类,直接插入,path可以写为0.如果是子集分类,需要获取父级的信息
        if($pid==0){//pid为0说明是顶级分类          
            $data['path'] = '0'; 

        }else{
            //如果不是顶级分类,获取pid并且读取父级分类的信息.用id=pid来获取该id的父级数据
            $info = DB::table('cates')->where('id','=',$pid)->first();//first表示取单条数据
            // dd($info);
            //拼接path路径
            $data['path'] = $info->path.','.$info->id;

        }
        $res = DB::table('cates')->insert($data);
        if($res){
            return redirect('/admin/cate/index')->with('success','添加分类成功');
        }else{
            return back()->with('error','添加分类失败');
        }
    
     }

     /**
      * 分类的列表页面显示
      */
     public function getIndex()
     {

        // self::getCatesByPid();//调用方法

        $cates = self::getCates();
        return view('cate.index',['cates'=>$cates]);
     }

     /**
      * 分类的修改操作
      */
     public function getEdit($id)
     {

        //读取当前id的分类信息
        $info = DB::table('cates')->where('id','=',$id)->first();//获取单条数据
        
        //分配变量解析模版
        return view('cate.edit',['cates'=>self::getCates(),'info'=>$info]);
     }

     /**
      * 分类的更新操作
      */
     public function postUpdate(Request $request)
     {

         $this->validate($request,[
            'name'=>'required',//当前要检测的字段
            
        ],[
            'name.required'=>'要修改的分类名不能为空',

        ]);

         $upd = DB::table('cates')->where('pid',$request->id)->count();
        if($upd>0){
            return back()->with('error','该分类下有子类,不允许修改');
        }


        $data = array();
        $pid = $request->input('pid');
        $data = $request->except('_token','id');
        //判断,如果是顶级分类,直接插入,path可以写为0.如果是子集分类,需要获取父级的信息
        if($pid==0){//pid为0说明是顶级分类          
            $data['path'] = '0'; 

        }else{
            //如果不是顶级分类,获取pid并且读取父级分类的信息.用id=pid来获取该id的父级数据
            $info = DB::table('cates')->where('id','=',$pid)->first();//first表示取单条数据
            // dd($info);
            //拼接path路径
            $data['path'] = $info->path.','.$info->id;
            
        }
        $res = DB::table('cates')->where('id',$request->input('id'))->update($data);
        if($res){
            return redirect('/admin/cate/index')->with('success','更新成功');

        }else{
            return back()->with('error','更新失败');
        }
       
     }
     /**
      * 分类的删除
      */
     public function getDelete($id)
     {
        //检测当前分类下是否有子分类,如果某分类的pid和它的id相同,那么说明该分类下是有子类的,不能删除
        $data = DB::table('cates')->where('pid',$id)->count();
        if($data>0){
            return back()->with('error','该分类下有子类,不允许删除');
        }
        //删除
        $res = DB::table('cates')->where('id',$id)->delete();
        if($res){
            return redirect('admin/cate/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
     }

     /**
      * 获取文章顶级分类
      * 封装成静态,在外部可以调用
      */
     
     public static function getTopCate()
     {
        return DB::table('cates')->where('pid',0)->get();
     }

     /**
      * 获取商品顶级分类
      */
     public static function getGoodsTopCate()
     {
        return DB::table('gcates')->where('pid',0)->get();
     }


     /**
     * 只获取分类ID 
     */
    public static function getCateByPid($pid)
    {
        //读取数据库  通过一个$pid,获取pid等于传过来的$pid的所有数据,也就是获取了id=pid的父级类下的所有数据
        $res = DB::table('cates')->select('id','path')->where('pid','=',$pid)->get();
        // dd($res);
         // dd($res);
        //遍历
        $data = [];
        foreach($res as $k => $v){
          
            $v->subs = self::getCateByPid($v->id);//$v下的sub里压入数据,数据是父id等于当前获得数据的id的所有分类.
            $data[] = collect($v)->toArray();
             
        }
       return $data;   
     }

}
