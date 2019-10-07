<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$s_hobby=$_POST['s_hobby'];
	$s_id=$_POST['c_id'];
	$s_hobbys=implode($s_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');

	$sql2="select * from student3 where s_name='$s_name'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "(❤ ω ❤)";
		header("refresh:2;url='4 24 1.php'");
		exit();
	}

	$sql="insert into student3(s_name,s_sex,s_hobby,c_id) values('$s_name','$s_sex','$s_hobbys','$s_id')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "(o゜▽゜)o☆";
		header("refresh:2;url='4 241list.php'");
	}



 ?>