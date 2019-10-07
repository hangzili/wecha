<?php 
	$new_name=$_POST['a_name'];
	//$old_name=$_POST['old_name'];
	$a_man=$_POST['a_man'];
	$a_id=$_POST['a_id'];
	$link=mysqli_connect('localhost','root','','xo');
 // a_name='$old_name' and
	$sql2="select * from action where a_name!='$new_name'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	if($arr2){
		echo "<script>alert=('名称重复，不能修改');location.href='4 10 22xiu.php?a_id=$a_id'</script>";
		exit();
	}

	$sql="update action set a_name='$a_name',a_man='a_man' where a_id='$a_id'";
	$res=mysqli_query($link,$sql);
	if($res){
		echo ("<script>alert=('修改成功');location.href='4 10 22xiu.php?a_id=$a_id'</script>");
	}
 ?>



