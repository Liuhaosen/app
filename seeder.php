数据填充:
	1.创建填充器  
		php artisan make:seeder InsertPostSeeder

	2.在新创建的文件的run方法中填写代码
		$data = [];
    	for($i=0;$i<100;$i++) {
    		$temp['title'] = str_random(20);
    		$temp['content']=str_random(100);
    		$temp['descr'] = str_random(10);
    		$temp['user_id']=rand(1,10);
    		$temp['cate_id'] = rand(1,5);
    		$temp['pic'] = str_random(10);
    		$temp['created_at'] = date('Y-m-d H:i:s');
    		$data[] = $temp;
    	}

    	DB::table('articles')->insert($data);
    	
    3.运行命令填充
    	php artisan db:seed

    4注意点 
    	类必须要导入模型类
		use Illuminate\Database\Eloquent\Model;
