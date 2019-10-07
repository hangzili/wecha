<?php 
header("content-type:text/html;charset=utf-8");
$id=$_POST['id'];
$nname=$_POST['nname'];
$npwd=$_POST['npwd'];
$nsex=empty($_POST['nsex'])?"":$_POST['nsex'];
$nint=$_POST['nint'];
$nmoney=$_POST['nmoney'];
$city=$_POST['city'];
$link=mysqli_connect('127.0.0.1','root','root','wish_new');
$sql="update admin set nname='$nname',npwd='$npwd',nsex='$nsex',nint='$nint',nmoney='$nmoney',city='$city' where id='$id'";
$res=mysqli_query($link,$sql);
if($res){
	echo '修改成功';
	header("refresh:2,url='admin_list.php'");
}

?>