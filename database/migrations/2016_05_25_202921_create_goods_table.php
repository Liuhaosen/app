<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//up 创建表
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id')->comment('商品的主键id');//默认主键id
            $table->string('title')->comment('商品的名称');//comment注释
            $table->decimal('price',8,2)->comment('商品的价格');
            $table->integer('kucun')->comment('商品库存');
            $table->string('pic')->comment('图片');
            $table->integer('cate_id')->comment('商品分类id');
            $table->text('content')->comment('商品的详情');
            $table->string('color')->comment('商品颜色');
            $table->string('size')->comment('商品尺寸');
            $table->tinyInteger('status')->comment('商品状态');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //down删除表
    {
        Schema::drop('goods');
    }
}
