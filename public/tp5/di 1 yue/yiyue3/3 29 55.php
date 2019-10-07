<?php
	header("content-type:text/html;charset=utf-8");
	$nname=$_POST['nname'];
	$nman=$_POST['nman'];
	$time=date("Y-m-d H:i:s",time());
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into book3(nname,nman,time,is_del) values('$nname','$nman','$time','$is_del')";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	if($res){
		echo '成功';
		header("refresh:2,url='3 29 551.php'");
	}
?>