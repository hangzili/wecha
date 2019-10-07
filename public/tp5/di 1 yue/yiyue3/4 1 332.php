<?php
	header("content-type:text/html;charset=utf-8");
	$zname=$_POST['zname'];
	$zpwd=$_POST['zpwd'];
	if(empty($zname)){
		die("账号不能为空");
	}
	if(empty($zpwd)){
		die ("密码不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from one where zname='$zname' and zpwd='$zpwd'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo '登陆成功';
		header("refresh:2,url='4 1 333.html'");
	}else {
		echo '登陆失败';
	}
?>