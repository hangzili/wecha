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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<form action="/add" method="post" enctype="multipart/form-data">
	@csrf
  <div class="form-group">
    <label for="title">标题</label>
    <input type="text" style="max-width: 300px;" class="form-control" value="{{ old('title') }}" required="required" id="title" name="title" placeholder="请输入标题">
  </div>
  <div class="form-group">
    <label for="author">作者</label>
    <input type="text" style="max-width: 300px;" class="form-control" required="required" value="{{ old('author') }}" id="author" name="author" placeholder="请输入作者">
  </div>

  <div class="form-group">
    <label for="author">图片上传</label>
    <input type="file" class="form-control" style="display:none" id="img" name="img" placeholder="请输入作者">
    <button class="but but-warning" id="button" type="button">上传缩略图</button>
    <div class="row" style="padding:10px">
    	<img style="max-height: 100px;" class="img-thumbnail" src="{{ asset('images/1.jpg') }}" alt="缩略图">
    </div>

  </div>

  <div class="form-group">
    <label for="content">内容</label>
    <script id="container"  name="content"  type="text/plain" style="width:800px"></script>

  </div>

  <button type="submit" class="btn btn-default">提交</button>
</form>
	<script src="{{ asset('js/uedirot/ueditor.config.js') }}"></script>
	<script src="{{ asset('js/uedirot/ueditor.all.js') }}"></script>
	<script src="{{ asset('js/article.js') }}"></script>
	<script>
		var ue=UE.getEditor('container');
		var content="{!! old('content') !!}";
		ue.ready(function(){
			ue.setContent(content);
		});
	</script>
@endsection
