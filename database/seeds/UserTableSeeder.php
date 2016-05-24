<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
       		$tmp['username']=str_random(20);
       		$tmp['password'] = Hash::make('iloveyou');
       		$tmp['email'] = str_random(10).'@163.com';
       		$tmp['token'] = str_random(20);
       		$tmp['status'] = 2;
       		$data[] = $tmp;
       	 }

       	 //写入数据库
       	 DB::table('users')->insert($data);
    }
}
