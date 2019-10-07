

<?php 
	$sou=empty($_GET['sou'])?"":$_GET['sou'];

	 $p=empty($_GET['p'])?"1":$_GET['p'];
    $page=($p-1) * 3;

	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from student where b_name like '%$sou%' limit $page,3";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from student where b_name like '%$sou%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/3); 
 ?>
 <form action="4 21 lian list.php" method="get">
 	<input type="text" name="sou">
 	<input type="submit" value="搜索">
 </form>
 		<table border="1">
 			<tr>
 				<td>id</td>
 				<td>姓名</td>
 				<td>性别</td>
 				<td>爱好</td>
 				<td>班级</td>
 				<td>操作</td>
 			</tr>
 			<?php foreach($array as $k=>$v){ ?>
 			<tr>
 				<td><?php echo $v['id'] ?></td>
 				<td><?php echo $v['b_name'] ?></td>
 				<td>
 					<?php 
 						if($v['b_sex']==1){
 							echo "男";
 						}else {
 							echo "女";
 						}

 					 ?>
 				</td>
 				<td>
 					<?php 
 						if($v['b_hobby']==1){
 							echo "读书";
 						} else if($v['b_hobby']==2){
 							echo "听音乐";
 						}else {
 							echo "打篮球";
 						}

 					 ?>
 				</td>
 				<td></td>
 				<td>
 					<a href="4 21 lian update.php?id=<?php echo $v['id'] ?>">修改</a>
 				</td>
 			</tr>
 			<?php } ?>
 		</table>
 		<?php for($i=1;$i<=$title;$i++){  ?>	
		<a href="4 21 lian list.php?p=<?php echo $i ?>&sou=<?php echo $sou ?>"><?php echo "第".$i."页" ?></a>	
 		<?php } ?> 









