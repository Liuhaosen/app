<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsInsertRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'price'=>'required',
            'kucun'=>'required',
            'cate_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'请填写商品名称',
            'price.required'=>'请填写商品价格',
            'kucun.required'=>'请填写商品库存数量',
            'cate_id.required'=>'请选择商品分类'
        ];
    }
}
