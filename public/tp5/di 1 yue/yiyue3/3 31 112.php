<?php
	header("content-type:text/html;charset=utf-8");
	$zname=$_POST['zname'];
	$zpwd=$_POST['zpwd'];
	if(empty($zname)){
		die("账号不能为空");
	}
	if(empty($zpwd)){
		die("密码不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zname where zname='$zname' and zpwd='$zpwd'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '登陆成功';
		header("refresh:2,url='3 31 113.html'");
	}

?>