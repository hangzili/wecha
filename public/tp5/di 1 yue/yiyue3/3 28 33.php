<?php 
	header("content-type:text/html;charset=utf-8");
	$tname=$_POST['tname'];
	$tauthor=$_POST['tauthor'];
	$tprice=$_POST['tprice'];
	$tid=$_POST['tid'];
	$ttext=$_POST['ttext'];
	$is_del=1;
	if(empty($tname)){
		die ("不能为空");
	}
	if(empty($tauthor)){
		die ("不能为空");
	}
	if(empty($tprice)){
		die ("不能为空");
	}
	if(empty($tid)){
		die ("不能为空");
	}
	if(empty($ttext)){
		die ("不能为空");
	}
	$one=substr($tname,0,1);
	if(is_numeric($one)){
		echo '第一个不能为数字';
	}
	if(is_numeric($tprice)==false){
		echo '价格必须是数字';
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into booka(tname,tauthor,tprice,tid,ttext,is_del) values('$tname','$tauthor','$tprice','$tid','$ttext','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='3 28 331.php'");
	}
?>