<?php
	$c_id=$_GET['c_id'];

	$link2=mysqli_connect('127.0.0.1','root','','xo');
	$sql2="select * from tt where a_id='$c_id'";
	$res2=mysqli_query($link2,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "下有子类，不能删除";
		header("refresh:2,url='4 10 11.php'");
		exit();
	}


	
	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="delete from action where a_id='$c_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert('删除成功');location.href='4 10 11.php'</script>";
		//header("refresh:2,url='4 10 11.php'");
	}



	//echo "<script>alert('删除成功');location.href='123.php'</script>"

 ?>



