<?php 
	$p_titte=$_POST['p_titte'];
	$p_content=$_POST['p_content'];
	$p_man=$_POST['p_man'];
	$p_id=$_POST['p_id'];
	$link=mysqli_connect('127.0.0.1','root','','xxoo');

	$sql2="select p_titte from pp where p_titte='$p_titte'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "标题不能重复";
		header("refresh:2,url='4 15 lian_xiu.php?p_id=$p_id'");
		exit();
	}

	$sql="update pp set p_titte='$p_titte',p_content='$p_content',p_man='$p_man' where p_id='$p_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo "<script>alert='(修改成功)';location.href='4 15 lian_list.php'</script>";
	}


 ?>