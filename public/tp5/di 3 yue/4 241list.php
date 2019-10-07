<?php 
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select student3.s_id,student3.s_name,student3.s_sex,student3.s_hobby,class3.c_name from student3 join class3 where class3.c_id=student3.c_id limit $page,2";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from student3";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd);
 ?>
 <table border=1>
 	<tr>
 		<td>ID</td>
 		<td>姓名</td>
 		<td>性别</td>
 		<td>爱好</td>
 		<td>班级</td>
 		<td>操作</td>
 	</tr>
	<?php 
		$brr=array("读书","听音乐","打篮球");
		foreach($array as $k=>$v){ 
		$aa=explode(',',$v['s_hobby']);
		$bb="";
		foreach($aa as $value){
			$bb.=$brr[$value];
		}
		?>
 	<tr>
 		<td><?php echo $v['s_id'] ?></td>
 		<td><?php echo $v['s_name'] ?></td>
 		<td>
 			<?php 
 				if($v['s_sex']==0){
 					echo "女";
 				}else{
 					echo "男";
 				}

 			 ?>
 		</td>
 		<td><?php echo $bb ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td>
 			<a href="">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1) ?>