<?php 
	$c_name=$_POST['c_name'];
	$c_sex=$_POST['c_sex'];
	$c_hobby=$_POST['c_hobby'];
	$c_hobbyy=implode(",",$c_hobby);
	$c_zhuang=1;
	$c_time=time();
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into clian(c_name,c_sex,c_zhuang,c_time,c_hobby) values('$c_name','$c_sex','$c_zhuang','$c_time','$c_hobbyy')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='4 29 1list.php'");
	}


 ?>