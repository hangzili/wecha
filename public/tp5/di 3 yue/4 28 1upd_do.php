<?php 
	$c_name=$_POST['c_name'];
	$old_name=$_POST['old_name'];
	$c_sex=$_POST['c_sex'];
	$c_id=$_POST['c_id'];
	$c_hobby=$_POST['c_hobby'];
	$c_city=$_POST['c_city'];
	$c_content=$_POST['c_content'];
	$c_hobbyy=implode(",",$c_hobby);
	$link=mysqli_connect('127.0.0.1','root','','student');

	$sql2="select * from class where c_name!='$old_name' and c_name='$c_name'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "不能重复";
		exit();
	}

	$sql="update class set c_name='$c_name',c_sex='$c_sex',c_hobby='$c_hobbyy',c_city='$c_city',c_content='$c_content' where c_id='$c_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "修改成功";
		header("refresh:2;url='4 28 1list.php'");
	}

 ?>