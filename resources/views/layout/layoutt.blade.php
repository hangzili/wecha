<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
</head>
<body>
	<!-- 上边内容区 -->
	<div class="container col-md-9">
		
	</div>
	<!-- 底部导航 -->
	@section('sidebar')
	<div class="container  col-md-3">
      <div class="foot-black"></div>
		<div class="weui-tabbar wy-foot-menu">
		  <a href="/" class="weui-tabbar__item weui-bar__item--on">
		    <div class="weui-tabbar__icon foot-menu-home"></div>
		    <p class="weui-tabbar__label">首页</p>
		  </a>
		  <a href="/classify" class="weui-tabbar__item">
		    <div class="weui-tabbar__icon foot-menu-list"></div>
		    <p class="weui-tabbar__label">分类</p>
		  </a>
		  <a href="/shopcart" class="weui-tabbar__item">
		    <span class="weui-badge" style="position: absolute;top: -.4em;right: 1em;">8</span>
		    <div class="weui-tabbar__icon foot-menu-cart"></div>
		    <p class="weui-tabbar__label">购物车</p>
		  </a>
		  <a href="/mine" class="weui-tabbar__item">
		    <div class="weui-tabbar__icon foot-menu-member"></div>
		    <p class="weui-tabbar__label">我的</p>
		  </a>
		</div>

  	</div>
  	@show
</body>
</html>