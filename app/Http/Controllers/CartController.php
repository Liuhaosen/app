<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
        /**
         * 加入购物车的功能
         */
        
        public function insert(Request $request)
        {
            //获取数据
            $data = $request->only('num','id');

            if(!$this->checkExists($data['id'])){
                  //将数据压入到session中 session(['id'=>100])
            $request->session()->push('cart',$data);
            return back()->with('info','成功加入购物车');
            }
        }

        /**
         * 购物车的列表页
         * @return [type] [description]
         */
        public function index(Request $request)
        {
            //读取购物车的信息
            $goods = session('cart');

            $data = [];
            if(!empty($goods)){
                foreach($goods as $k=>$v){
                    $tmp = Goods::find($v['id']);
                    $tmp['num'] = $v['num'];
                    $data[] = $tmp;
                    
                }
            }
        
            return view('cart.index',['goods'=>$data]);
        }

        /**
         * 清除session
         */
        public function clear(Request $request)
        {
            $request->session()->flush();
        }

        /**
         * 查重操作
         */
        public function checkExists($id)
        {
            //获取购物车的商品信息
            $goods = session('cart');

            //遍历
            if(empty($goods)) return false;
            foreach($goods as $k=>$v)
            {
               if($v['id']==$id){
                    return true;
               } 
            }
            return false;
        }

        /**
         * 删除购物车指定商品
         */
        
        public function delete(Request $request)
        {
           
            //获取指定id的商品
            $id = $request->input('id');

            $data = session('cart');
            foreach($data as $k =>$v){
                if($v['id']==$id){
                    // $request->session()->forget($k);
                    unset($data[$k]);//删除session
                }
            }
            // dd($data);
            session(['cart'=>$data]);//删除后再压入到session中,显示删除
            return redirect('/cart/index');
        }

            
    // /**
    //  * ajax改变商品数量
    //  */
    // public function changeNum(Request $request)
    // {
    //     $data = $request->except('_token');
        
    //     $num = \Session::get('cart.' . $data['id']);
        
    //     switch($data['caozuo']) {

    //         case '+':

    //             $newNum = $num + $data['num'];

    //             \Session::put('cart.' . $data['id'], $newNum);

    //             $res = ['id'=>$data['id'], 'num'=>$newNum];
                
    //             break;

    //         case '-':

    //             $newNum = $num - $data['num'];
            
    //             if ($newNum > 0) {
    //                 \Session::put('cart.' . $data['id'], $newNum);
    //                 $res = ['id'=>$data['id'], 'num'=>$newNum];
    //             } else {
    //                 \Session::forget('cart.' . $data['id']);
    //                 $res = ['id'=>$data['id'], 'num'=>0];
    //             }
            
    //             break;

    //         case '=':
    //             if ($data['num'] > 0) {
    //                 \Session::put('cart.' . $data['id'], $data['num']);

    //                 $res = ['id' => $data['id'], 'num' => $data['num']];
    //             } else {
    //                 \Session::forget('cart.' . $data['id']);

    //                 $res = ['id'=>$data['id'], 'num'=>0];
    //             }
    //             break;
    //     }

    //     return json_encode($res);
    // }
}
