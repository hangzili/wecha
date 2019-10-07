<?php
	header("content-type:text/html;charset=utf-8");
	$nname=$_POST['nname'];
	$ncontent=$_POST['ncontent'];
	$time=date("Y-m-d H:i:s",time());
	if(empty($nname)){
		die ("不能为空");
	}
	if(empty($ncontent)){
		die ("不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','root','wish_new');
	$sql="insert into wisha(nname,ncontent,time) values('$nname','$ncontent','$time')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '许愿成功';
		header("refresh:2,url='indexb.php'");
	}
?>