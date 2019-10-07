<?php 
$c_id=$_GET['c_id'];
 $link=mysqli_connect('127.0.0.1','root','','18099');//删除页面
 $sql="select * from news where c_id='$c_id'";
 $arr=mysqli_query($link,$sql);
 $array=mysqli_fetch_assoc($arr);
 if($array){
 	echo "有子类，不能删除";
 	header("refresh:2,url='cate_list.php'");
 	exit();
 }


 $sql="delete from category where c_id='$c_id'";
 $res=mysqli_query($link,$sql);
 if($res){
 	echo '删除成功';
 	header("refresh:2,url='cate_list.php'");
 }

 ?>