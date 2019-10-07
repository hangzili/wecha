<?php 
	header('content-type:text/html;charset=utf-8');
	$xing=$_POST['xing'];
	$hao=$_POST['hao'];
	$yong=$_POST['yong'];
	$shi=date('Y-m-d H:i:s,time()');

	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into shouji(xing,hao,yong,shi) values('$xing','$hao','$yong','$shi')";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '成功';
		header("refresh:2,url='3 20 111.php'");
	}else {
		echo '失败';
	}

?>
