<?php 
	header('content-type:text/html;charset=utf-8');
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '失败';
	$sql="delete from shouji where id='$id'";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '删除成功';
		header("refresh:2,url='3 20 111.php'");
	}else {
		echo '删除失败';
	}
	
	
?>