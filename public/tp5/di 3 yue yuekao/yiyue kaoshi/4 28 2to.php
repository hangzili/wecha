<?php 
	$c_name=$_POST['c_name'];
	$c_sex=$_POST['c_sex'];
	$c_hobby=$_POST['c_hobby'];
	$c_ban=$_POST['c_ban'];
	$c_hobbyy=implode(",",$c_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into ccc(c_name,c_sex,c_hobby,c_class) values('$c_name','$c_sex','$c_hobbyy','$c_ban')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='4 28 2list.php'");
	}


 ?>