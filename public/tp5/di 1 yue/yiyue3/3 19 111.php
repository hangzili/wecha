<?php
	header('content-type:text/html;charset=utf-8');
	$ming=$_POST['ming'];
	$jia=$_POST['jia'];
	$shu=$_POST['shu'];
	$shi=empty($_POST['shi'])?"":$_POST['shi'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="insert into  tushu(b_name,b_price,b_shu,shi) values('$ming','$jia','$shu','$shi')";
	$rsc=mysqli_query($link,$sql);
	//var_dump ($rsc);
	if($rsc==true){
		echo '正确';
		header("refresh:2,url='3 19 1111.php'");
	}
?>

