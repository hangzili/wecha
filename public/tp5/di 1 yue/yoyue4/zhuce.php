<?php
	header('content-type:text/html;charset=utf-8');
	$uname=$_POST['uname'];
	$upwd=md5($_POST['upwd']);
	//$time=date("Y-m-d H-i-s",time())
	if(empty($uname)){
		echo '用户名不能为空';
	}
	if(empty($upwd)){
		echo '密码不能为空';
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into denglu1(uname,upwd,time) values('$uname','$upwd','$time')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo "<script>alert('注册成功');location.href='denglu.html'</script>";
		
	}
	

?>