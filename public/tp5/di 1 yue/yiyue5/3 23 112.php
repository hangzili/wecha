<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="update zhoushi is_del=2 where id";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	

?>