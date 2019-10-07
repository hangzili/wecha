<?php
	header('content-type:text/html;charset=utf-8');
	//删除页面
	$id=$_GET['id'];
	//echo $id;
	$link=mysqli_connect('127.0.0.1','root','root','wish');
	$sql="delete from admine_add where id='$id'";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	if($res){
		echo '删除成功';
		header("refresh:2,url='admin_list.php'");
	}

?>