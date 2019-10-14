<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ url('add_user_tag') }}" methos="post">
		@csrf
		<input type="hidden" value="{{ $id }}" name="id">
	<table border="1">
		<tr>
			<td></td>
			<td>poenid</td>
			<td>操作</td>
		</tr>
		@foreach($list as $v)
		<tr>
			<td><input type="checkbox" name="openid_list[]" value="{{ $v }}"></td>
			<td>{{ $v }}</td>
			<td>
				<a href="{{ url('add_user_list') }}?id={{ $v }}">查看用户标签</a>
			</td>
		</tr>
		@endforeach
	</table>
	<input type="submit" value="提交">
	</form>
</body>
</html>