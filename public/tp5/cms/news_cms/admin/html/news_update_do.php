<?php 
$n_title=$_POST['n_title'];
$n_id=$_POST['n_id'];	
$n_content=$_POST['n_content'];	
$n_man=$_POST['n_man'];	
$n_time=time();
$link=mysqli_connect('127.0.0.1','root','','18099');

$sql2="select * from news where n_title='$n_title'";
$res2=mysqli_query($link,$res2);
$arr2=mysqli_fetch_assoc($res2);
if($arr2){
	echo "<script>alert=('不能重复，重复修改');location.href='news_update.php?n_id=$n_id'</script>";
	die();
}

$sql="update  news set n_title='$n_title',n_content='$n_content',n_man='$n_man',n_time='$n_time' where n_id='$n_id'";
$res=mysqli_query($link,$sql);
if($res){
	echo "<script>alert=('修改成功');location.href='news_list.php'</script>";
}

 ?>