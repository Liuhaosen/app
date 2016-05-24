1.网站页面加载慢的时候 应该怎么办  
	查看firebug去找到死链, 慢链

2.网站统计
	cnzz  百度统计
	使用方式: 查看文件
	在我们的网站中加入一段指定的js代码  script标签

3验证码的使用解决方案
	在验证码输出之前加 ob_clean;
	在验证码输出之后加 die

4验证码的使用的过程
	地址: http://www.jianshu.com/p/8e4ac7852b5a
	1.使用composer 安装插件
		在composer.json文件中加入代码 
		"require": {
	        "gregwar/captcha": "1.*"
	    },
	    使用composer update

	2.在控制器代码中使用该类来实例化对象去创建验证码
		ob_clean();//清除操作
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        die;
    3.在前台html中的img src属性中填写url路径 指向到方法中即可

防止sql注入的手段
	1.pdo预处理
	2.对内容进行转义  或者 做实体化操作

验证码的自动识别 
	apistore.baidu.com  ocr文字识别

发送邮件的流程
	1.配置   .env配置
	2.修改配置文件  'from' => ['address' => 'love_lamp@163.com', 'name' => null],
	3.发送

邮箱帐号怎么设置
	1.注册163邮箱
	2 设置(在最上方中间位置)  ->  POP3/SMTP/IMAP ->  勾选POP3  和SMTP  
	3.左侧菜单有设置客户端授权密码   ->  划分密码

表单验证
	前端js表单验证是为了降低服务器的压力,提高用户体验
	服务器的表单验证是为了保证数据的安全

短信发送平台
	http://www.ucpaas.com  云之讯

如何在laravel中添加一个包扩展
	1.在composer.json文件中  在require配置项中进行添加    ->  composer update
	2.composer require curl/curl

