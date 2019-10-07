<?php
	header("content-type:text/html;charset=utf-8");
	$dname=$_POST['dname'];
	$dyear=$_POST['dyear'];
	$dmoney=$_POST['dmoney'];
	$time=date("Y-m-d H:i:s",time());
	$is_del=1;
	if(empty($dname)){
		die("名称不能为空");
	}
	if(empty($dyear)){
		die("年龄不能为空");
	}
	if(empty($dmoney)){
		die("工资不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into zname(dname,dyear,dmoney,time,is_del) values('$dname','$dyear','$dmoney','$time','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 31 115.php'");
	}

?>