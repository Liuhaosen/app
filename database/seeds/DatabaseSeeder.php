<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //填充文章表
        $this->call(ArticleTableSeeder::class);
        //填充用户表
        $this->call(UserTableSeeder::class);
        //填充商品表
        $this->call(GoodsTableSeeder::class);

        Model::reguard();
    }
}
