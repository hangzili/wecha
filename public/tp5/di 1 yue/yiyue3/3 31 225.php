<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$gname=$_POST['gname'];
	$gtext=$_POST['gtext'];
	$gprice=$_POST['gprice'];
	$gnumber=$_POST['gnumber'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update za set gname='$gname',gtext='$gtext',gprice='$gprice',gnumber='$gnumber' where id='$id'";
	$res=mysqli_query($link,$sql);
	$a=mysqli_affected_rows($link);
	if($a===1){
		echo '修改成功';
		header("refresh:2,url='3 31 222.php'");
	}else if($a===0){
		echo '未修改，请修改';
		header("refresh:2,url='3 31 224.php?id=$id'");
	}else {
		echo '修改失败';
	}
?>