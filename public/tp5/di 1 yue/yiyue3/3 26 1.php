<?php
	header('content-type:text/html;charset=utf-8');
	$yname=$_POST['yname'];
	$mima=$_POST['mima'];
	$time=date("H-m-d H:i:s",time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into lian1(yname,mima,time) values('$yname','$mima','$time')";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '成功';
		header("refresh:2,url=3 26 11.php");
	}

?>