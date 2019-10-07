<?php 
	$b_name=$_POST['b_name'];
	$b_author=$_POST['b_author'];
	$fen=$_POST['fen'];
	$time=time();
	$b_status=1;
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into book(b_name,b_author,b_time,b_status,c_id) values('$b_name','$b_author','$time','$b_status','$fen')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='2 26 1list.php'");
	}


 ?>