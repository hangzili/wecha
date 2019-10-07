<?php 
	$c_id=$_POST['c_id'];
	$c_name=$_POST['c_name'];
	$c_sex=$_POST['c_sex'];
	$c_hobby=$_POST['c_hobby'];
	$c_class=$_POST['c_class'];
	$c_hobbyy=implode(",",$c_hobby);
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="update ccc set c_name='$c_name',c_sex='$c_sex',c_hobby='$c_hobbyy',c_class='$c_class' where c_id='$c_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "修改成功";
		header("refresh:2;url='4 28 2list.php'");
	}

 ?>