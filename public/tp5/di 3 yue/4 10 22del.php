<?php 
	$a_id=$_GET['a_id'];
	$link=mysqli_connect('localhost','root','','xo');

	$sql2="select * from tt where a_id='$a_id'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "<script>alert('有子类，不能删除');location='4 10 2.php'</script>";
		exit();
	}

	$sql="delete from action where a_id='$a_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert('删除成功');location='4 10 2.php'</script>";
	}
 ?>
j