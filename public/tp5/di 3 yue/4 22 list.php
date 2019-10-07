<?php 
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select student.s_id,student.s_name,student.s_sex,student.s_hobby,class.c_name from student join class where class.id=student.c_id limit $page,2";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from student";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);
 ?>
 <table border="1">
 	<tr>
 		<td>ID</td>
 		<td>姓名</td>
 		<td>性别</td>
 		<td>爱好</td>
 		<td>所在班级</td>
 		<td>操作</td>
 	</tr>
 	<?php
 		$aa =array('读书','听音乐','打篮球');
 	 foreach($array as $k=>$v){ 
 	 	$bb =explode(',',$v['s_hobby']);
 	 	$hh ="";
 	 	foreach ($bb as  $value) {
 	 		$hh.=$aa[$value];
 	 		}	
 	 ?>
 	<tr>
 		<td><?php echo $v['s_id'] ?></td>
 		<td><?php echo $v['s_name'] ?></td>
 		<td>
 			<?php 
 				if($v['s_sex']==0){
 					echo "女";
 				}else {
 					echo "男";
 				}

 			 ?>
 		</td>
 		<td><?php echo $hh ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td>
 			<a href="4 22 update.php?s_id=<?php echo $v['s_id'] ?>">修改</a>
 			<a href="4 22 del.php?s_id=<?php echo $v['s_id'] ?>">删除</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 	<a href="4 22 list.php?p=1"><?php echo "首页" ?></a>
 <?php for($i=1;$i<=$title;$i++){ ?>
 <?php } ?>
 <?php 
 	$ia=$p-1;
 	if($ia<$title){
 		$ia=1;
 	}
 	$ib=$p+1;
 	if($ib>=$title){
 		$ib=$title;
 	}

  ?>
  	
 	<a href="4 22 list.php?p=<?php echo $ia ?>"><?php echo "上一页" ?></a>
 	<a href="4 22 list.php?p=<?php echo $ib ?>"><?php echo "下一页" ?></a>
	<a href="4 22 list.php?p=<?php echo $title ?>"><?php echo "尾页" ?></a>