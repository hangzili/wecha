<?php 
	$t_man=$_POST['t_man'];
	$t_name=$_POST['t_name'];
	$t_time=time();
	if(empty($t_man)){
		die ("添加人不能为空");
	}
	if(empty($t_name)){
		die ("添加名字不能为空");
	}
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="insert into tt(t_man,t_name,t_time) values('$t_man','$t_name','$t_time')";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert='(添加成功)';location.href='4 15 lian_list.php'</script>";
	}




 ?>