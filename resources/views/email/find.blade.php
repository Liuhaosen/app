<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>重置密码</title>
</head>
<body>
	<p>请点击链接重置密码</p>　<a href="{{config('app.url')}}/reset?id={{$id}}&token={{$token}}">重置</a>
	
</body>
</html>