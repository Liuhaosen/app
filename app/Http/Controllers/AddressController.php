<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
        /**
         * 收货地址的添加
         */
        public function insert(Request $request)
        {
            $address = new Address;
            //数据
            $address->sheng = $request->input('sheng');
            $address->shi = $request->input('shi');
            $address->xian = $request->input('xian');
            $address->jiedao = $request->input('jiedao');
            $address->phone = $request->input('phone');
            $address->name = $request->input('name');
            $address->user_id = session('id');
            $address->isdefault = $request->input('isdefault',0);
            if($address->save()){
                return back();
            }else{
                return false;
            }
        }

        /**
         * 通过用户的id来获取所有的收货地址
         */
        
        public static function getAllAddressByUserId($id)
        {
            return Address::where('user_id',$id)->get();
        }
}
