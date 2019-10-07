<?php
	header("content-type:text/html;charset=utf-8");
	$nname=$_POST['nname'];
	$nradio=empty($_POST['nradio'])?"":$_POST['nradio'];
	$nage=$_POST['nage'];
	$time=date("Y-m-d H:i:s",time());
	$is_del=1;
	$zhuang=1;
	if(empty($nname)){
		die ("不能为空");
	}
	if(empty($nradio)){
		die ("不能为空");
	}
	if(empty($nage)){
		die ("不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into zhousia(nname,nradio,nage,time,is_del,zhuang) values('$nname','$nradio','$nage','$time','$is_del','zhuang')";
	$res=mysqli_query($link,$sql);
	if($sql){
		echo '成功';
		header("refresh:2,url='3 28 221.php'");
	}
?>