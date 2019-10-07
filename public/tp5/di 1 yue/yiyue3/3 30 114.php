<?php
	header("content-type:text/html;charset=utf-8");
	$sname=$_POST['sname'];
	$aprice=$_POST['aprice'];
	$sdesc=$_POST['sdesc'];
	$is_del=1;
	if(empty($sname)){
		die ("商品名称不能为空");
	}
	if(empty($aprice)){
		die ("商品价格不能为空");
	}
	if(empty($sdesc)){
		die ("商品介绍不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into zuci2(sname,aprice,sdesc,is_del) values('$sname','$aprice','$sdesc','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 30 115.php'");
	}
?>