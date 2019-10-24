<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>课程修改</title>
</head>
<body>
	<form action="/wechat/class_add_do" method="post">
		@csrf
		第一节课：<select name="one" id="">
					@if($list['one']==语文)
					<option value="语文" checked>语文</option>
					<option value="数学">数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==数学)
					<option value="语文">语文</option>
					<option value="数学" checked>数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==英语)
					<option value="语文">语文</option>
					<option value="数学">数学</option>
					<option value="英语" checked>英语</option>
					@endif
				 </select><br>
		第二节课：<select name="two" id="">
					@if($list['one']==语文)
					<option value="语文" checked>语文</option>
					<option value="数学">数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==数学)
					<option value="语文">语文</option>
					<option value="数学" checked>数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==英语)
					<option value="语文">语文</option>
					<option value="数学">数学</option>
					<option value="英语" checked>英语</option>
					@endif
				 </select><br>
		第三节课：<select name="three" id="">
					@if($list['one']==语文)
					<option value="语文" checked>语文</option>
					<option value="数学">数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==数学)
					<option value="语文">语文</option>
					<option value="数学" checked>数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==英语)
					<option value="语文">语文</option>
					<option value="数学">数学</option>
					<option value="英语" checked>英语</option>
					@endif
				 </select><br>
		第四节课：<select name="four" id="">
					@if($list['one']==语文)
					<option value="语文" checked>语文</option>
					<option value="数学">数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==数学)
					<option value="语文">语文</option>
					<option value="数学" checked>数学</option>
					<option value="英语">英语</option>
					@else if($list['one']==英语)
					<option value="语文">语文</option>
					<option value="数学">数学</option>
					<option value="英语" checked>英语</option>
					@endif
				 </select><br>
				 <input type="submit" value="添加">
	</form>
</body>
</html>