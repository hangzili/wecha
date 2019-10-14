<!DOCTYPE html>
<html lang="en">
<head>
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
		$("#wecha_login").click(function(){
			window.location.href = "{{ url('/wecha/login') }}";
		})
	})
</script>