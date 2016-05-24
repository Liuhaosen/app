<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册成功</title>
</head>
<body>
	<p>恭喜您注册成功,请点击链接完成激活</p>　<a href="{{config('app.url')}}/active?id={{$id}}&token={{$token}}">激活</a>
	
</body>
</html>