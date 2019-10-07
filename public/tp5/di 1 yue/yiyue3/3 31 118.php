<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$dname=$_POST['dname'];
	$dyear=$_POST['dyear'];
	$dmoney=$_POST['dmoney'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update zname set dname='$dname',dyear='$dyear',dmoney='$dmoney' where id='$id'";
	$res=mysqli_query($link,$sql);
	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
		header("refresh:2,url='3 31 115.php'");
	}else if($a===0){
		echo '请修改';
		header("refresh:2,url='3 31 117.php?id=$id'");
	}else {
		echo '修改错吴';
	}
?>