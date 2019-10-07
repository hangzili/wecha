<?php 
	header("content-type:text/html;charset=utf-8");
	$wname=$_POST['wname'];
	$wcontent=$_POST['wcontent'];
	$wtime=date("Y-m-d H:i:s",time());
	$link=mysqli_connect('127.0.0.1','root','root','wish') or '失败';
	$sql="insert into wish(wname,wcontent,wtime) value('$wname','$wcontent','$wtime')";
	$res=mysqli_query($link,$sql);
	if($res==true){
		echo '许愿成功';
		header("refresh:2,url='index.php'");
	}else {
		echo '许愿失败';
	}


?>