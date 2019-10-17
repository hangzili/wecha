<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>类型</td>
			<td>路径</td>
			<td>添加事件</td>
		</tr>
		@foreach($list as $v)
		<tr>
			@if($v['type']==1)
			<td>图片</td>
			@elseif($v['type']==2)
			<td>语音</td>
			@elseif($v['type']==3)
			<td>视频</td>
			@elseif($v['type']==4)
			<td>图文</td>
			@endif
			<td>{{ $v['path'] }}</td>
			<td> {{date('Y-m-d H:i:s', $v['addtime'] ) }}</td>
		</tr>
		@endforeach
	</table>
</body>
</html>