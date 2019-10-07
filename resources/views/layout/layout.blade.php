<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ env('APP_NAME')  }} @yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
	<!-- 顶部导航条 -->


	 <div class="container-fluid  list-group-item-info">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">我的博客</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">首页</a></li>
        <li><a href="#">文章</a></li>
        <li><a href="#">动态</a></li>
        <li><a href="#">动态</a></li>
        <li><a href="#">个人中心</a></li>

        @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('登陆') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('注册') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('退出') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest



        
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <!-- 大的bnner -->


  	<div class="jumbotron list-group-item-warning">
	  <h1>Hello, world!</h1>
	  <p>...</p>
	  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	</div>
  <!-- 左边导航栏 -->


<div class="container col-md-3">
	@section('slide')
  
	@show
</div>
	
  <!-- 右边内容区 -->
   <div class="container  col-md-9">
      @yield('content')
  </div>
</body>
</html>