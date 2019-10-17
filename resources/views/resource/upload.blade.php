<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>素材上传</title>
</head>
<body>
	<form action="{{ url('wecha/do_upload') }}" method="post" enctype="multipart/form-data">
		@csrf
		<select name="type" id="">
			<option value="image">图片</option>
			<option value="video">视频</option>
			<option value="thumb">缩略图</option>
			<option value="voice">语音</option>
		</select><br>
		<input type="file" name="rsource"><br>
		<input type="submit" value="上传">
	</form>
</body>
</html>