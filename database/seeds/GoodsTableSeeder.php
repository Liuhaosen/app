<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
       for ($i=0; $i <20 ; $i++) { 
       		$tmp['title']=str_random(20);
       		$tmp['price']=rand(100,10000);
       		$tmp['cate_id']=rand(9,29);
       		$tmp['content']=str_random(200);
       		$tmp['kucun']=rand(1,299);
       		$tmp['color']='红色,绿色,白色,蓝色,粉色';
       		$tmp['updated_at']=date('Y-m-d H:i:s');
       		$tmp['created_at']=date('Y-m-d H:i:s');
       		$tmp['size']='37,38,39,40,41,S,M,L,XL,XXL,XXXL';
       		$tmp['status'] = 1;
       		$data[] = $tmp;
       	 }

       	 //写入数据库
       	 DB::table('goods')->insert($data);
    }
}
