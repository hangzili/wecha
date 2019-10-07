<?php
	header("content-type:text/html;charset=utf-8");
	$sname1=$_POST['sname1'];
	$sname2=$_POST['sname2'];
	$sname3=$_POST['sname3'];
	$sname4=$_POST['sname4'];
	$aihao=$_POST['aihao'];
	$naihao=implode(",",$aihao);
	$is_del=1;
	$time=date("Y-m-d H:i:s",time());
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into sname12(sname1,sname2,sname3,sname4,is_del,time,aihao) values('$sname1','$sname2','$sname3','$sname4','$is_del','$time','$naihao')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '添加成功';
		header("refresh:2,url='4 1 221.php'");
	}
?>