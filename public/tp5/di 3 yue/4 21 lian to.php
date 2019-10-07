<?php 
	$b_name=$_POST['c_name'];
	$b_sex=$_POST['b_sex'];
	$b_hobby=$_POST['b_hobby'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from student where b_name='$b_name'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo "名称不能重复";
		header("refresh:2;url='4 21 lian.php'");
		exit();
	}
	if(empty($b_sex)){
		echo "性别不能为空";
	}
	if(empty($b_hobby)){
		echo "爱好不能为空";
	}
	$link2=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql2="insert into student(b_name,b_sex,b_hobby) values('$b_name','$b_sex','$b_hobby')";
	$res2=mysqli_query($link2,$sql2);
	if($res2){
		echo "添加成功";
		header("refresh:2;url='4 21 lian list.php'");
	}



 ?>