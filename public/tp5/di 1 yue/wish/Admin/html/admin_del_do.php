<?php
	header('content-type:text/html;charset=utf-8');
	//放入回收站
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','wish');
	$sql="update admine_add set is_del=2 where id='$id'";
	$res=mysqli_query($link,$sql);
	
	if($res){
		echo '放入回收站成功';
		header("refresh:2,url='admin_list.php'");
	}

?>