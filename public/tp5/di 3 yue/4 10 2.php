<?php
	$app=empty($_GET['asd'])?"":$_GET['asd'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('localhost','root','','xo');
	$sql="select * from action where a_name like '%$app%' limit $page,2";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from action where a_name like '%$app%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$eas=$arr2['con'];
	$total=  ceil($eas/2);
 ?>
 <form action="4 10 2.php" method="get">
 	<input type="text" name="asd">
 	<input type="submit" value="搜索">
 </form>
 <table border="1">
 	<tr>
 		<td>id</td>
 		<td>名称</td>
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
 			<a href="4 10 22del.php?a_id=<?php echo $v['a_id'] ?>">删除</a>
 			<a href="4 10 22xiu.php?a_id=<?php echo $v['a_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1;$i<=$total;$i++){ ?>
	<a href="4 10 2.PHP?p=<?php echo $i ?>&asd=<?php echo $app ?>"><?php echo "第".$i."页" ?></a>
 <?php } ?>