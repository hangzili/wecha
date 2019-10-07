<?php
	header('content-type:text/html;charset=utf-8');
	$xingming=$_POST['xingming'];
	$mingcheng=$_POST['mingcheng'];
	$bianhao=$_POST['bianhao'];
	$jiage=$_POST['jiage'];
	$shuliang=$_POST['shuliang'];
	$ren=$_POST['ren'];
	$is_del=1;
	$time=date("Y-m-d H:i:s",time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into xiaoshou(xingming,mingcheng,bianhao,jiage,shuliang,ren,is_del,time) values('$xingming','$mingcheng','$bianhao','$jiage','$shuliang','$ren','$is_del','$time')";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 28 111.php'");
	}

?>