<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$aid=$_POST['aid'];
	$s_hobby=$_POST['s_hobby'];
	$s_hobbys=implode(',',$s_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into student2(s_name,s_sex,s_hobby,c_id) values('$s_name','$s_sex','$s_hobbys','$aid')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "添加成功";
		header("refresh:2;url='2 23 1list.php'");
	}



 ?>