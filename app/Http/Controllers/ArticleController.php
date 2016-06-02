<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertArticleRequest;

class ArticleController extends Controller
{
      /**
       * 文章的添加页面
       */
      public function getAdd()
      {
        //调用catecontroller里的获取分类的方法,因为是静态方法,所以可以直接调用
        // $cates = CateController::getCates();
      
        return view('article.add',['cates'=>CateController::getCates()]);
      }

      /**
       *文章的插入操作
       */
      public function postInsert(InsertArticleRequest $request)
      {
        
            $data = $this->dealRequest($request);//调用处理数据的方法

            $data['create_at'] = date('Y-m-d H:i:s');

            //插入数据库
            if(DB::table('articles')->insert($data)){
                return redirect('/admin/article/index')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
      }

      /**
       * 文章的列表
       */
      public function getIndex(Request $request)
      {
            
          //做分页
          $articles = DB::table('articles')->where(function($query)use($request){
                if($request->input('keywords')){
                        $query->where('title','like','%'.$request->input('keywords').'%');
                }
          })->paginate($request->input('num',10)); 
          return view('article.index',['articles'=>$articles,'request'=>$request->all()]);//分配变量记得后边加all

      }

      /**
       * 文章的修改页面
       */
      public function getEdit($id)
      {
            //获取当前指定id的文章信息
            $article = DB::table('articles')->where('id',$id)->first();
           return view('article.edit',['article'=>$article,'cates'=>CateController::getCates()]);//这里分配变量需要将分类信息也传过去,将分类内容进行解析和遍历

      }

      /**
       * 文章的更新操作
       */
      public function postUpdate(InsertArticleRequest $request)//获取表单验证类
      { 
            //处理数据
            $data = $this->dealRequest($request);//调用处理数据的方法
            //插入数据库
            if(DB::table('articles')->where('id',$request->input('id'))->update($data)){
                return redirect('/admin/article/index')->with('success','更新成功');
            }else{
                return back()->with('error','更新失败');
            }
      }


         /**
         * 文章的删除页面
         */
        public function getDelete($id){
            //因为文章有图片,所以需要检测图片
            $arc = DB::table('articles')->where('id',$id)->first();
            // dd($arc);
            $path = '.'.$arc->pic;
            if(file_exists($path)){
                unlink($path);
            }
            if(DB::table('articles')->where('id',$id)->delete()){
                return redirect('/admin/article/index')->with('success','删除成功');
            }else{
                return back()->with('error','删除失败');
            }



        }


        /**
         * 封装一个处理数据的方法,供添加和修改操作使用
         */
        private function dealRequest(Request $request)
        {
               // dd($request->all());
          $data = $request->except(['_token']);
          //文件上传
          // dd($request->hasFile('pic'));
          // 判断文件是否上传
          if($request->hasFile('pic')){
                //拼接文件的名称
                $pathname = date('Ymd').rand(100000,999999).'.'.$request->file('pic')->getClientOriginalExtension();//获取后缀名
                // dd($pathname);
                //上传文件
                $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
                //拼接路径字段
                $data['pic'] = trim(Config::get('app.upload_dir').$pathname,'.');
                // dd($data['pic']);
          }
            $data['user_id']=1;
            return $data;
        }

        /**
         * 前台博客显示页面
         */
        
        public function show(Request $request,$id)
        {
            //读取指定id的文章信息,为了给前台模版查询出作者名和分类名
            $arcs = DB::table('articles')
            ->where(function($query)use($request){
                if($request->has('user')){
                    $query->where('user_id',$request->input('user'));
                }
            })
            ->where(function($query)use($request){
                if($request->has('name')){
                    $query->where('name',$request->input('name'));
                }
            })
            ->select('users.username','articles.*','cates.name')
            ->join('cates','cates.id','=','articles.cate_id')
            ->join('users','users.id','=','articles.user_id') 
            ->where('articles.id',$id)
            ->first();//该处的id会冲突,所以必须表名是表名.id,或者使用as别名的方法.
            //用关联表的方法,免去了使用getUsernameById的方法,从而一条语句直接查询出所需要的结果.

           
           // dd($arcs);
            
            //读取文章所对应的评论信息
             $comments = DB::table('comments')
             ->select('users.username','comments.*')
             ->join('users','users.id','=','comments.user_id')
            ->where('article_id',$id)
            ->get();

            //获取推荐文章列表
            $recs = DB::table('articles')->where('rec',1)->orderBy('id','desc')->limit(5)->get();
            
            //获取所有的分类信息
            $allCates = CateController::getCatesByPid(0);
            // dd($allCates);
            
            //获取顶级分类,在侧边栏显示
            return view('article.show',[
              'arcs'=>$arcs,
              'comments'=>$comments,
              'cates'=>CateController::getTopCate(),
              'recs'=>$recs,
              'recent'=>DB::table('articles')->orderBy('id','desc')->limit(5)->get(),
              'allCates'=>$allCates,
              
              ]);
        }

        /**
         * 文章列表显示页面
         */
        public function listShow(Request $request)
        {
            
          //读取数据库中的文章内容
            $arcs = DB::table('articles')
            ->where(function($query)use($request){
                if($request->has('cate')){
                    $query->where('cate_id',$request->input('cate'));
                }
            })
            ->where(function($query)use($request){
                if($request->has('user')){
                    $query->where('user_id',$request->input('user'));
                }
            })
            ->where(function($query)use($request){
                if($request->has('name')){
                    $query->where('name',$request->input('name'));
                }
            })
            ->select('users.username','articles.*','cates.name')
            ->join('users','articles.user_id','=','users.id')
            ->join('cates','articles.cate_id','=','cates.id')
            ->orderBy('id','desc')
            ->paginate(7);
        // dd($arcs);

            return view('article.list',[
              'allCates'=>CateController::getCatesByPid(0),
              'arcs'=>$arcs,
              'request'=>$request->all()
              ]);
        }



}   
