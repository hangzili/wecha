<?php 
	$c_name=$_POST['c_name'];
	$c_man=$_POST['c_man'];
	date_default_timezone_set("PRC");
	$c_time=time();
	$link=mysqli_connect('127.0.0.1','root','','18099') or '失败';
	if(empty($c_name)){
		exit("名称必填");
	}else {
		$sql="select * from category where c_name='$c_name'";			//添加页面
		$res=mysqli_query($link, $sql);
		$arr=mysqli_fetch_assoc($res);
		if($arr){
			exit("已有不能重复重复添加");
		}
	}


	$link=mysqli_connect('127.0.0.1','root','','18099') or '失败';
	$sql="insert into category(c_name,c_man,c_time) values('$c_name','$c_man','$c_time')";
	//echo $sql;
	$res=mysqli_query($link, $sql);
	if($res){

		echo '添加成功';
		header("refresh:2,url='cate_list.php'");
	}


 ?>