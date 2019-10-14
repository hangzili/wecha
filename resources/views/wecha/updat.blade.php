<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	<form action="updat_do" method="post">
		@csrf
		<input type="hidden" value="{{$all['id']}}" name="id">
		标签名称：<input type="text" value="{{$all['name']}}" name="name">
		<input type="submit" value="修改">
	</form>
</body>
</html>