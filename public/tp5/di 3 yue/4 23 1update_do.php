<?php 
	$s_name=$_POST['s_name'];
	$s_sex=$_POST['s_sex'];
	$s_id=$_POST['s_id'];
	$s_hobby=$_POST['s_hobby'];
	$s_hobbys=implode(',',$s_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');

	$link2=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql2="select * from student2 where s_name='$s_name'";
	$res2=mysqli_query($link2,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "名称重复";
		header("refresh:2;url='4 23 1update.php?s_id=$s_id'");
		exit();
	}

	$sql="update student2 set s_name='$s_name',s_sex='$s_sex',s_hobby='$s_hobbys' where s_id='$s_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "修改成功";
		header("refresh:2;url='2 23 1list.php'");
	}

 ?>