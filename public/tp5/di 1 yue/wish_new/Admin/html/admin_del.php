<?php 
header("content-type:text/html;charset=utf-8");
$id=$_GET['id'];
$link=mysqli_connect('127.0.0.1','root','root','wish_new');
$sql="delete from admin where id='$id'";
$res=mysqli_query($link,$sql);
if($res){
	echo '删除成功';
	header("refresh:2,url='admin_list.php'");
}

?>
