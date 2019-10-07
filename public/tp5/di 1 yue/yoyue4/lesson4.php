<?php
	header('content-type:text/html;charset=utf-8');
	$id=$_POST['id'];
	$k_name=$_POST['k_name'];
	$k_desc=$_POST['k_desc'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="update lesson set k_name='$k_name',k_desc='$k_desc' where id='$id'";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	if($res==true){
		echo '修改成功';
		header("refresh:2,url='lesson1.php'");
	}
?>