<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>标签展示</title>
</head>
<body>
	<a href="/label_add">标签添加</a>
	<table border="1">
		<tr>
			<td>标签id</td>
			<td>标签名称</td>
			<td>操作</td>
		</tr>
		@foreach($list as $v)
		<tr>
			<td>{{ $v['id'] }}</td>
			<td>{{ $v['name'] }}</td>
			<td>
				<a href="{{ url('/delete') }}?id={{ $v['id'] }}">删除</a>
				<a href="{{ url('/update') }}?id={{ $v['id'] }}&name={{ $v['name'] }}">修改</a>
				<a href="{{ url('/wechat') }}?id={{ $v['id'] }}">给用户打标签</a>
			</td>
		</tr>
		@endforeach
	</table>
</body>
</html>