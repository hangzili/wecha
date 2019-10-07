<?php
	header('content-type:text/html;charset=utf-8');
	$sname=$_POST['sname'];
	$radio=$_POST['radio'];
	$sage=$_POST['sage'];
	$sxinxi=$_POST['sxinxi'];
	$sgao=$_POST['sgao'];
	$datea=date("Y-m-d H:i:s",time());
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into zhou1(sname,radio,sage,sxinxi,sgao,datea,is_del) values('$sname','$radio','$sage','$sxinxi','$sgao','$datea','$is_del')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '正确';
		header("refresh:2,url='3 24 111.php'");
	}
?>

