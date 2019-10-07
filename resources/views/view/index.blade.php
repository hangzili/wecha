<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('标题')</title>
</head>
 <body>
        @section('sidebar')
            这是
        @show
			一啊呀
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>