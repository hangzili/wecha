<?php 
	$old_name=$_POST['old_name'];
	$a_name=$_POST['a_name'];
	$a_man=$_POST['a_man'];
	$a_id=$_POST['a_id'];

	$link2=mysqli_connect('127.0.0.1','root','','xo');
	$sql2="select * from action where a_name!='$old_name' and a_name='$a_name'";
	$res2=mysqli_query($link2,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "<script>alert('名称已有，不能重复');location='4 10 11.php'</script>";
		exit();

	}

	
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="update action set a_name='$a_name',a_man='$a_man' where a_id='$a_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert('修改成功');location='4 10 11.php'</script>";

	}
 ?>

 