<?php
	header('content-type:text/html;charset=utf-8');
	$sname=$_POST['sname'];
	$mima=$_POST['mima'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into shangpin(sname,mima) values('$sname','$mima')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '正确';

	}

?>
