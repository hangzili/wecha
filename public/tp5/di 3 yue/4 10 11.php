<?php
	$sou=empty($_GET['sou'])?"":$_GET['sou'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 3;

	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select * from action where a_name like '%$sou%' limit $page,3";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}


	$sql2="select count(*) as con from action where a_name like '%$sou%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$count=$arr2['con'];
	$total=ceil ($count/3);
	//echo $total;
 ?>
 <form action="4 10 11.php" method="get">
 	<input type="text" name="sou">
 	<input type="submit" value="搜索">
 </form>
 <table border=1>
 	<tr>
 		<td>id</td>
 		<td>名字</td>
 		<td>添加人</td>
 		<td>时间</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['a_id'] ?></td>
 		<td><?php echo $v['a_name'] ?></td>
 		<td><?php echo $v['a_man'] ?></td>
 		<td><?php echo date("Y-m-d H:i:s",$v['a_time']) ?></td>
 		<td>
 					<a href="4 10 1xiu.php?a_id=<?php echo $v['a_id'] ?>">修改</a>
 					<a href="4 10 1del.php?c_id=<?php echo $v['a_id'] ?>">删除</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
		<a href="4 10 11.php?p=<?php echo 1 ?>&sou=<?php echo $sou ?>"><?php echo "末页" ?></a> 
	<?php for($i=1;$i<=$total;$i++){ 
 	?>	
		<a href="4 10 11.php?p=<?php echo $i ?>&sou=<?php echo $sou ?>"><?php echo "第".$i."页" ?></a>	
 	<?php } ?> 
 		<a href="4 10 11.php?p=<?php echo $total ?>&sou=<?php echo $sou ?>"><?php echo "末页" ?></a> 
 
