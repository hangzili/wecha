<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>课程添加</title>
</head>
<body>
	<form action="/wechat/class_add_do" method="post">
		@csrf
		第一节课：<select name="one" id="">
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
				 </select><br>
		第二节课：<select name="two" id="">
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
				 </select><br>
		第三节课：<select name="three" id="">
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
				 </select><br>
		第四节课：<select name="four" id="">
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
				 </select><br>
				 <input type="submit" value="添加">
	</form>
</body>
</html>