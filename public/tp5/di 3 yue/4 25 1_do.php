<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$s_hobby=$_POST['s_hobby'];
	$id=$_POST['id'];
	$s_hobbyy=implode(",",$s_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into student3(s_name,s_sex,s_hobby,c_id) values('$s_name','$s_sex','$s_hobbyy','$id')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='4 25 1list.php'");
	}
 ?>