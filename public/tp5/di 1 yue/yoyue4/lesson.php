<?php
	header('content-type:text/html;charset=utf-8');
	$k_name=$_POST['k_name'];
	$k_desc=$_POST['k_desc'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into lesson(k_name,k_desc) value('$k_name','$k_desc')";
	$rsc=mysqli_query($link,$sql);
	if($rsc==true){
		echo '成功';
		header("refresh:2,url='lesson1.php'");
	}
?>