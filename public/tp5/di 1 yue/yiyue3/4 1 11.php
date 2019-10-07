<?php
	header("content-type:text/html;charset=utf-8");
	$dname=$_POST['dname'];
	$dpwd=md5($_POST['dpwd']);
	if(empty($dname)){
		die ("账户不能未空");
	}
	if(empty($dpwd)){
		die ("密码不能未空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into shi1(dname,dpwd) values('$dname','$dpwd')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '登陆成功';
		header("refresh:2,url='4 1 111.html'");
	}
?>