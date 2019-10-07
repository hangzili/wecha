<?php 
	$c_name=$_POST['c_name'];
	$c_sex=$_POST['c_sex'];
	$c_hobby=$_POST['c_hobby'];
	$c_city=$_POST['c_city'];
	$c_content=$_POST['c_content'];
	$c_hobbyy=implode(",",$c_hobby);
	$link=mysqli_connect('127.0.0.1','root','','student');
	$sql="insert into class(c_name,c_sex,c_hobby,c_content,c_city) values('$c_name','$c_sex','$c_hobbyy','$c_content','$c_city')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='4 28 1list.php'");
	}




 ?>