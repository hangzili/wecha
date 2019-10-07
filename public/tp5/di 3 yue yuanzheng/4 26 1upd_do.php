<?php 
	$b_name=$_POST['b_name'];
	$b_id=$_POST['hid'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="update book set b_name='$b_name' where b_id='$b_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "修改成功";
		header("refresh:2;url='2 26 1list.php'");
	}


 ?>