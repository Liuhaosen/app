<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use DB;
use App\Http\Controllers\CateController;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsInsertRequest;
class GoodsController extends Controller
{
        /**
         * 商品后台添加页面
         */
        
        public function getAdd()
        {
            $cates = CateController::getCates();
            return view('goods.add',['cates'=>$cates]);
        }

        /**
         * 商品后台插入操作
         */
        
        public function postInsert(GoodsInsertRequest $request)
        {

            $goods = new Goods;
              //处理数据
            $goods = $this->dealData($request,$goods);

            // $cates = DB::table('cates')->select('cates.pid')->get();
            // dd($cates);
            // dd($cates['0']->pid);
          

            // foreach($cates as $k=>$v){
               
               // if(substr_count($v->pid,$request->cate_id)>0){
           
                   //  return back()->with('error','对不起,该分类下有子类,不能添加商品');
                   // }else{
                    
                    if($goods->save()){
                            return redirect('/admin/goods/index')->with('success','添加成功');
                        }else{
                            return back()->with('error','添加失败');
                        }
                   // }
            // }
            
            

            
            
        }

        /**
         * 商品后台列表显示
         */
        public function getIndex(Request $request)
        {

            $goods = Goods::orderBy('id','desc')
                ->where(function($query)use($request){
                    if($request->has('keywords')){
                        $query->where('title','like','%'.$request->input('keywords').'%');
                    }
                    
                })
                ->paginate($request->input('num',10));


            //模版解析
            return view('goods.index',[
                'goods'=>$goods,
                'request'=>$request->all()

                ]);

        }

        /**
         * 商品的修改页面
         */
        
        public function getEdit($id)
        {
            $goods = Goods::findOrFail($id);//将当前指定id的信息读出来
            //创建分类数据
            $cates = CateController::getCates();
            return view('goods.edit',['goods'=>$goods,'cates'=>$cates]);
        }

        /**
         * 后台商品的修改操作
         */
        
        public function postUpdate(Request $request)
        {
            
            //更新数据表
            $goods = Goods::findOrFail($request->input('id'));
            //调用方法处理数据
            $goods = $this->dealData($request,$goods);

             if($goods->save()){
                return redirect('/admin/goods/index')->with('success','更新成功');
            }else{
                return back()->with('error','更新失败');
            }

        }

        /**
         * 后台商品的删除操作
         */
        
        public function getDelete($id)
        {
            $goods = Goods::findOrFail($id);
            if($goods->delete()){
                return back()->with('success','删除成功');
            }else{
                return back()->with('error','删除失败');
            }
        }

        /**
         * 处理商品数据的方法进行封装
         */
        
        private function dealData($request,$goods)
        {
            //填充参数进行赋值
               $goods->title = $request->input('title');
               $goods->price = $request->input('price');
               $goods->cate_id = $request->input('cate_id');
               $goods->content = $request->input('content');
               $goods->kucun = $request->input('kucun');
               $goods->color = implode(',',$request->input('color'));
               $goods->size = implode(',',$request->input('size'));

                //图片上传
                if($request->hasFile('pic')){
                    //创建文件的随机名称
                    $name = time().rand(100000,999999).'.'.$request->file('pic')->getClientOriginalExtension();
                    $request->file('pic')->move(config('app.upload_dir'),$name);
                    $goods->pic = trim(config('app.upload_dir').$name,'.');
                }
                return $goods;
        }


        /**
         * 商品详情的显示
         * goods-1
         */
        
        public function show($id)
        {
            //商品信息
            $goods = Goods::join('cates','goods.cate_id','=','cates.id')
                ->select('goods.*','cates.name')  
                ->findOrFail($id);
            //读取关联商品内容
            $relateGoods = $goods->where('cate_id',$goods->cate_id)->orderBy('id','desc')->limit(4)->get();
            //解析模版
            return view('goods.show',[
                'goods'=>$goods,
                'relateGoods'=>$relateGoods
                ]);
        }

        /**
         * 商品列表
         */
        
        public function goodsList(Request $request)
        {
            //获取指定ID的商品信息
            // $goods = DB::table('goods')
            //     ->where(function($query)use($request){
            //         if($request->has('cate')){
            //             $query->where('cate_id',$request->input('cate'));
            //         }
            //     })
            //     ->select('cates.id','goods.*','cates.name')
            //     ->join('cates','goods.cate_id','=','cates.id')
            //     ->paginate(9);
            //读取关联商品内容

           // dd($goods);
           // dd($flattened);
           // foreach($flattened as $k=>$v){
           //      if(in_array($request->input('cate'),$flattened)){
           //      $data = Goods::where($request->input('cate'),'=',$v)->get();
           //  }else{
           //      dd('222');
           //  }

           // }
            
            // dd($data);
            
        //上边的方法,点击导航栏的一级分类只能显示该分类的商品,点击二级分类也只能显示二级分类的商品
            
            //先用'使用Pid来找当前分类下所有分类'的方法,获取到所有子类
             $allcates = CateController::getCateByPid($request->input('cate'));
             // dd($allcates);
             //然后使用collect函数,获取数据,然后使用flatten方法,将多维数组变成一个一维数组
           $flattened = collect($allcates)->flatten()->all();
           //由于获取的数据是当前分类下的子类,而不显示当前类下的商品,所以需要将当前类也压入
           $flattened[] = $request->input('cate');
           // dd($flattened);
           //使用whereIn来对比查找商品,并分页.
           $goods = Goods::whereIn('cate_id', $flattened)->paginate(9);

            
            return view('goods.list',[
                'goods'=>$goods, 
                'allCates'=>CateController::getCatesByPid(0),
                'request'=>$request->all(), 
                'flattened'=>$flattened              
                ]);
        }


        /**
         * 商城首页
         */
        
        public function goodsIndex()
        {   
            // //获取所有顶级分类
            // $cates = CateController::getPathByPid(0);
            // $flat = collect($cates)->flatten()->all();
            // dd($flat);

            $cates = CateController::getTopCate();   
          
            // //商品信息
            $good = Goods::where('kucun','>',300)->limit(4)->get();
            
            $goods = Goods::join('cates','goods.cate_id','=','cates.id')
                ->select('goods.*','cates.name')
                ->limit(5)
                ->get();
              
            foreach($goods as $k=>$v){

                $goods[$k]->cname = $cates[$k]->name;
                $goods[$k]->cid = $cates[$k]->id;
            }
            
            //解析模版
            return view('goods.goodsIndex',[
                'goods'=>$goods,
                'good'=>$good
                ]);          
          
        }
}
