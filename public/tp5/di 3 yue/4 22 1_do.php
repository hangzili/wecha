<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$s_hobby=$_POST['s_hobby'];
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select * from student where s_name='$s_name'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
	if($arr){
		echo "名称已有，不能重复";
		header("refresh:2;url='4 22 1.php'");
		exit();
	}
	if(empty($s_sex)){
		echo "性别不能为空";
		//header("refresh:2;url='4 22 1.php'");
		exit();
	}
	if(empty($s_hobby)){
		echo "爱好不能为空";
		header("refresh:2;url='4 22 1.php'");
		exit();
	}
	$s_hobbys=implode(",",$s_hobby);
	$sql2="insert into student(s_name,s_sex,s_hobby) values('$s_name','$s_sex','$s_hobbys')";
	$res2=mysqli_query($link,$sql2);
	if($res2){
		echo "添加成功";
		header("refresh:2;url='4 22 list.php'");
	}




 ?>