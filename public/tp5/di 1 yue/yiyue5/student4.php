<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	echo $id;
	$sname=$_POST['sname'];
	//echo $sname;
	//echo $id;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update sudent set sname='$sname' where id='$id'";
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '修改成功';
		header("refresh:2,url='student1.php'");
	}

?>
	