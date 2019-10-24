<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>课程修改</title>
</head>
<body>
	<form action="/wechat/class_update_do" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		第一节课：<select name="one" id="">
					@if($list['one'] == 1)
					<option value="1" selected>语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
					@elseif($list['one'] ==2)
					<option value="1">语文</option>
					<option value="2" selected>数学</option>
					<option value="3">英语</option>
					@elseif($list['one'] ==3)
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3" selected>英语</option>
					@endif
				 </select><br>
		第二节课：<select name="two" id="">
					@if($list['two'] ==1)
					<option value="1" selected>语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
					@elseif($list['two'] ==2)
					<option value="1">语文</option>
					<option value="2" selected>数学</option>
					<option value="3">英语</option>
					@elseif($list['two'] ==3)
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3" selected>英语</option>
					@endif
				 </select><br>
		第三节课：<select name="three" id="">
					@if($list['three'] ==1)
					<option value="1" selected>语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
					@elseif($list['three'] ==2)
					<option value="1">语文</option>
					<option value="2" selected>数学</option>
					<option value="3">英语</option>
					@elseif($list['three'] ==3)
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3" selected>英语</option>
					@endif
				 </select><br>
		第四节课：<select name="four" id="">
					@if($list['four'] ==1)
					<option value="1" selected>语文</option>
					<option value="2">数学</option>
					<option value="3">英语</option>
					@elseif($list['four'] ==2)
					<option value="1">语文</option>
					<option value="2" selected>数学</option>
					<option value="3">英语</option>
					@elseif($list['four'] ==3)
					<option value="1">语文</option>
					<option value="2">数学</option>
					<option value="3" selected>英语</option>
					@endif
				 </select><br>
				 <input type="submit" value="修改">
	</form>
</body>
</html>