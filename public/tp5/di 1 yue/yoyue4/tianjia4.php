<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	//echo $id;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="delete from goods1 where id='$id'";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '删除成功';
		header("refresh:2,url='tianjia3.php'");
	}
	
?>