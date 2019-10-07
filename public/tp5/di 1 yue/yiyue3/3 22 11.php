<?php
	header('content-type:text/html;charset=utf-8');
	$nname=$_POST['nname'];
	$nman=$_POST['nman'];
	$is_del=1;
	$ntime=date('Y-m-d H:i:s',time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into tiku3(nname,nman,ntime,is_del) values('$nname','$nman','$ntime','$is_del')";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '跳转正确';
		header("refresh:2,url='3 22 111.php'");
	}
?>
