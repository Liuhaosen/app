1.使用composer命令来安装laravel框架
	composer create-project laravel/laravel your-project-name --prefer-dist "5.1.*"

2. 配置虚拟主机
	如果需要检测域名解析是否成功,在cmd中直接ping这个域名

3. 创建路由规则,控制器,显示模版

4.路由->控制器->模版

5.在解析模版的时候,需要将数据分配过来,controller里的方法名和模版页面名相同.  

6.控制器里,添加/删除/修改的页面显示方法就是先获取所有的数据信息,然后在view()里添加参数,分配变量过去.  在增删改查的四个方法内才是操作步骤

7.后台页面按照添加,列表,修改,删除的顺序来做.

8.表单验证可以放到一个专门的类里,在requests文件夹里, public function authorize()
    {
        return true;
    }
    这里把return false 改为true

9.编写数据填充 seeder

10. 修改ueditor编辑器里的图片保存路径,到public/b/ueditor/php/config.json内修改即可.

11.6. 调整工具栏中的命令  
		var ue = UE.getEditor('editor',{
	        toolbars: [
	            ['fullscreen', 'source', 'undo', 'redo', 'bold','simpleupload']
	        ]
	    });


分类
		递归方式获取分类  先获取顶级分类,再通过顶级分类获取子集分类.
		[
			顶级类[
					'id'=>1,
					'name'=>'男装',
					'sub'=>[
						1[
							'id'=>4,
							'name'=>'裤子'
							'sub'=>[
								[
									'id'...
								]	
							]
						]
						2[
							'id'=>5,
							'name'=>'上上衣'			
						]	
					]			
				 ]
				顶级类[
					'id'=>2,
					'name'=>'女装'	
					'sub'=>[
						 [
							id=>....
		
						]	
					]
				]
		]




抓包流程,
1安装JDK,打开抓包工具.修改浏览器代理(点击局域网LAN设置,修改地址为本机127.0.0.1 端口设置为80)

2修改环境变量,在计算机属性中,修改环境变量,在系统变量中的PATH后加分号,然后加上JDK的bin目录路径

3.提交表单,查看抓包工具的proxy,点击forward