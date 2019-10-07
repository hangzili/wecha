<?php
	header('content-type:text/html;charset=utf-8');
	$yong=$_POST['yong'];
	$mima=$_POST['mima'];
	$xinxi=$_POST['xinxi'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into denglu(yong,mima,xinxi) value('$yong','$mima','$xinxi')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '正确';
		header("refresh:2,url=3 23 221.php");
	}

?>
