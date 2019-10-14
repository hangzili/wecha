<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<form action="/label_add_do" method="post">
		@csrf
		标签名：<input type="text" name="label_name">
		<input type="submit" value="添加">
	</form>
</body>
</html>