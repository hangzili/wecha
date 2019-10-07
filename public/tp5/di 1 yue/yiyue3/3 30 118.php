<?php
	header("content-type:text/html;charset=utf-8");
	$id=$_POST['id'];
	$sname=$_POST['sname'];
	$aprice=$_POST['aprice'];
	$sdesc=$_POST['sdesc'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update zuci2 set sname='$sname',aprice='$aprice',sdesc='$sdesc' where id='$id'";
	$res=mysqli_query($link,$sql);
	//if($res){
	//	echo '修改成功';
	//	header("refresh:2,url='3 30 115.php'");
	//}
	$q=mysqli_affected_rows($link);
	if($q==0){
		echo ("请修改");
		header("refresh:2,url='3 30 117.php?id=$id'");
	}else if($q==1){
		echo ("修改成功");
		header("refresh:2,url='3 30 115.php'");
	}else{
		echo ("失败");
		header("refresh:2,url='3 30 117.php?id=$id'");
	}
	
?>