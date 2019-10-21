<!DOCTYPE html>
<html lang="en">
<head><meta name="x-csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8">
	<title>登陆</title>
</head>
<body>
	<button id="wecha_login">授权登陆</button>
</body>
</html>
<script src="{{ asset('js/app.js') }}"></script>
<script>
	$(function(){
		$.ajaxSetup({
		     headers : {
		       'X-CSRF-TOKEN' : $("meta[name='x-csrf-token']").attr('content')
		     }
		 });
		$("#wecha_login").click(function(){
			window.location.href = "{{ url('/long/longs') }}";
		})
	})
</script>