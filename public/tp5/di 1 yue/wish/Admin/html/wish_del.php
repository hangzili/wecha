<?php
	header('content-type:text/html;charset=utf-8');
	$wid=$_GET['wid'];
	$link=mysqli_connect('127.0.0.1','root','root','wish');
	$sql="delete from wish where wid='$wid'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '删除愿望成功';
		header("refresh:2,url='wish_list.php'");
	}

?>