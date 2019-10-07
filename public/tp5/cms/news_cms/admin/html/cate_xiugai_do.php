<?php 
	 session_start();//开启sessions
	 date_default_timezone_set("PRC");
	 $c_id=$_POST['c_id'];
	 $old_name=$_POST['old_name'];
	 $c_man=$_POST['c_man'];
	 $new_name=$_POST['c_name'];				
	 $ca_time=$_POST['c_time'];
	 //$c_time=time($ca_time);
	  //echo $ca_time;die;
	 $a="$ca_time";
	 $c_time=(strtotime($a));

	 $link=mysqli_connect('127.0.0.1','root','','18099');//修改页面
	 $sql="select * from category where c_name='$new_name' and c_name!='$old_name'";
	 $res=mysqli_query($link,$sql);
	 $arr=mysqli_fetch_assoc($res);
	 if($arr){
	 	echo '名称已存在';
	 	header("refresh:2,url='cate_xiugai.php?c_id=$c_id'");
	 	exit;
	 }


	 $sql="update category set c_name='$new_name',c_time='$c_time',c_man='$c_man' where c_id='$c_id'";
	 $res=mysqli_query($link,$sql);
	 if($res){
	 	echo "修改成功";
	 	header("refresh:2,url='cate_list.php'");
	 }
 ?>
