<?php 
header("content-type:text/html;charset=utf-8");
$nname=$_POST['nname'];
$npwd=$_POST['npwd'];
$nsex=$_POST['nsex'];
$nint=$_POST['nint'];
$nmoney=$_POST['nmoney'];
$city=$_POST['city'];
$is_del=1;
$link=mysqli_connect('127.0.0.1','root','root','wish_new');
$sql="insert into admin(nname,npwd,nsex,nint,nmoney,city,is_del) values('$nname','$npwd','$nsex','$nint','$nmoney','$city','$is_del')";
$res=mysqli_query($link,$sql);
if($res){
	echo '添加成功';
	header("refresh:2,url='admin_list.php'");
}


?>
