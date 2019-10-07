<?php
	header('content-type:text/html;charset=utf-8');
	$sname=$_POST['sname'];
	//echo $sname;
	if(empty($sname)){
		echo '不能为空';
	}
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="insert into sudent(sname) values('$sname')";
	//echo $sql;
	$src=mysqli_query($link,$sql);
	if($src==true){
		echo '成功';
		header("refresh:2,url='student1.php'");
	}else {
		
	}
?>
		