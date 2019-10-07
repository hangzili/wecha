<?php
	header("content-type:text/html;charset=utf-8");
	$uname=$_POST['uname'];
	$upwd=md5($_POST['upwd']);
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from user where uname='$uname' and upwd='$upwd'";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	$arr=mysqli_fetch_assoc($res);
	if($arr==true){
		echo '登陆成功';
	}else{
		echo '登陆失败';
	}
?>