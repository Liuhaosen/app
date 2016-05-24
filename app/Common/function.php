<?php 
	/**
	 * 设置加载自定义文件方式
	 * 1 创建文件 function.php
	 * 2 设置该文件在composer.json中的路径引入
	 *  "files":[
            "app/Common/function.php"
        ]
	 * 3 使用conposer命令 composer dump-autoload
	 */
	

	
	/**
	 * 显示数据状态的方法 
	 * @param  [type] $stateId [description]
	 * @return [type]          [description]
	 */
	function showState($stateId)
	{
		switch($stateId)
		{
			case 1:
				return '正常状态';
				break;
			case 2:
				return '激活状态';
				break;
			default:
				return '未知状态';
				break;
		}
	}

	/**
	 * 显示分类层级的方法 
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	function pathName($path)
	{
		$num = substr_count($path,',');
		$pathname='';
		if($num==1){
			$pathname='顶级类';
		}else{

			$pathname = str_repeat('　　',$num).$num.'级类';
			
		}

		

		return $pathname;
	}


	function getUsernameById($uid)
	{
		return  DB::table('users')->where('id',$uid)->first()->username;
	}

 ?>