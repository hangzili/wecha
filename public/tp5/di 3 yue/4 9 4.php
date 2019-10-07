<?php 
	$app=empty($_GET['searce'])?"":$_GET['searce'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 3;

	 $link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from category where c_name like '%$app%' limit $page,3";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}



	$sql2="select count(*) as con from category where c_name like '%$app%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$count=$arr2['con'];
	$total=ceil ($count/3);

 ?>

 <form action="4 9 4.php" method="get">
 	<input type="text" name="searce">
 	<input type="submit" value="搜索">
 </form>
 <table border="1">
 	<tr>
 		<th>id</th>
 		<th>名称</th>
 		<th>添加人</th>
 		<th>时间</th>
 	</tr>
 	<?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['c_id'] ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td><?php echo $v['c_man'] ?></td>
 		<td><?php echo date("Y-m-d H:i:s",$v['c_time']) ?></td>
 	</tr>
 	<?php } ?>
 </table>
 <?php 
 		for($i=1;$i<=$total;$i++){ ?>
	<a href="4 9 4.php?p=<?php echo $i ?>&searce=<?php echo $app ?>"><?php echo "第".$i."页" ?></a>
 		<?php } ?>