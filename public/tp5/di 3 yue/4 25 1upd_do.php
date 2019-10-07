<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$s_hobby=$_POST['s_hobby'];
	$s_id=$_POST['s_id'];
	$s_hobbys=implode(",",$s_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="update student3 set s_name='$s_name',s_sex='$s_sex',s_hobby='$s_hobbys' where s_id='$s_id'";
	if($sql){
		echo "修改成功";
		header("refresh:2;url='4 25 1list.php'");
	}


 ?>