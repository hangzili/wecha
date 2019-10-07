<?php 
	$c_name=$_POST['c_naem'];
	$c_man=$_POST['c_man'];
	$c_time=time();
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="insert into category(c_name,c_man,c_time) values('$c_name','$c_man','c_time')";
	$res=mysqli_query($link,$sql);
	if($res){
		$_SESSION['username'] = $res['username'];
		echo '添加成功';
		header("refresh:2,url='cate_list.php'");
	}





 ?>