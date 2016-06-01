<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Goods;
use App\Models\OrderGoods;

class OrderController extends Controller
{
    /**
     * 添加订单
     */
    public function insert(Request $request)
    {   	
    	//将购物车信息存入session
    	// dd($request->only(['goods']));
        if($request->has('goods')){
    	session(['order_goods'=>$request->only(['goods'])['goods']]);
        } 

        //获取用户所有的收货地址
        $addresses = AddressController::getAllAddressByUserId(session('id'));
        
    	return view('order.address',[
            'addresses'=>$addresses
            ]);   	
    }

    /**
     * 创建订单
     */
    public function create(Request $request)
    {
        // dd($request->session()->get('order_goods')['goods']);
        $order = new Order;
        $order->user_id = session('id');
        $order->address_id = $request->address_id;
        $order->total = $this->getTotal();
        $order->order_num = $this->getOrderNum();
        $order->status = 1;
        if($order->save()){
            $data = [];
            $goods= [];
            foreach($request->session()->get('order_goods') as $k=>$v){
                  $tmp['goods_id']  = $v['id'];
                  $tmp['num'] = $v['num'];
                  $tmp['order_id'] = $order->id;//$order插入成功后自动存入主键的id 
                  $data[] = $tmp;
                  $goods[] = Goods::find($v['id']);
            }
            // dd($goods);
            //执行插入
            OrderGoods::insert($data);
            //显示模版 让用户确认
            return view('order.confirm',[
                'order'=>$order,
                'request'=>$request,
                'goods'=>$goods
                ]);
        }else{
            return back();
        }
    }

    /**
     * 计算订单中的总数
     */
    private function getTotal()
    {
       $t = 0;
       //获取订单中的商品信息
       $goods = session('order_goods');
      
       foreach($goods as $k=>$v){
            $price = Goods::find($v['id'])['price'];
            $t +=$price*$v['num'];
       }      
       return $t;
    }

    /**
     * 获取订单的编号
     */
    private function getOrderNum()
    {
        return time().rand(100000,999999);
    }
}
