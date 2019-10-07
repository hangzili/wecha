@extends('layout/layout')

@section('title')
头子

@endsection


@section('slide')
<ul class="list-group">
  <li class="list-group-item list-group-item-success"><a href="">导航菜单栏</a></li>
  <li class="list-group-item list-group-item-info"><a href="/">文章列表</a></li>
  <li class="list-group-item list-group-item-warning"><a href="/add">文章添加</a></li>
  <li class="list-group-item list-group-item-danger"><a href="">评论</a></li>

 </ul>

@endsection
@section('content')
<table border="3" height="400px" width="800px">
  <tr align="center">
	<td>ID</td>
	<td>标题</td>
	<td>发布时间</td>
	<td>作者</td>
	<td>浏览量</td>
	<td>图片</td>
	<td>操作</td>
  </tr>

  
  @foreach($list as $v)
  <tr align="center">
	<td>{{ $v->id }}</td>
	<td>{{ $v->title }}</td>
	<td>{{ $v->created_at }}</td>
	<td>{{ $v->author }}</td>
	<td></td>
	<td><img src="{{ asset('storage/'.$v->img) }}" style="max-height: 50px"></td>
	<td>
		<span class="label label-danger"><a href="/del?id={{ $v->id }}">删除</a></span>
		<span class="label label-danger"><a href="">修改</a></span>
	</td>
  </tr>
  @endforeach
</table>
{{ $list->links() }}
@endsection