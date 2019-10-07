<?php
	header("content-type:text/html;charset=utf-8");
	$gname=$_POST['gname'];
	$gtext=$_POST['gtext'];
	$gprice=$_POST['gprice'];
	$gnumber=$_POST['gnumber'];
	$time=date("Y-m-d H:i:s",time());
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into za(gname,gtext,gprice,gnumber,is_del,time) values('$gname','$gtext','$gprice','$gnumber','$is_del','$time')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "成功";
		header("refresh:2,url='3 31 222.php'");
	}

?>