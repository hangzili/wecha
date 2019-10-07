<?php
	header('content-type:text/html;charset=utf-8');
	//删除页面以$_GET['id值']接受id值，链接数据库
	$s1=$_GET['id'];
	$s2=mysqli_connect('127.0.0.1','root','root','a3191');
	//写删除的sql语句，执行sql语句，if判断并给出提示
	$s3="delete from diannao where id='$s1'";
	//echo $s3;
	$s4=mysqli_query($s2,$s3);
	//var_dump ($s4);
	if($s4==true){
		echo '删除成功';
	}else {
		echo '删除失败';
	}
?>