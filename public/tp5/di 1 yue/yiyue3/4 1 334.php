<?php
	header("content-type:text/html;charset=utf-8");
	$aname=$_POST['aname'];
	$aradio=$_POST['aradio'];
	$ahoddy=$_POST['ahoddy'];
	$atext=$_POST['atext'];
	$asheng=empty($_POST['asheng'])?"":$_POST['asheng'];
	$nhoddy=implode(",",$ahoddy);
	$time=date("Y-m-d H:i:s",time());
	$is_del=1;
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into one(aname,nhoddy,aradio,atext,asheng,time,is_del) values('$aname','$nhoddy','$aradio','$atext','$asheng','$time','$is_del')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo '成功';
		header("refresh:2,url='4 1 335.php'");
	}
?>