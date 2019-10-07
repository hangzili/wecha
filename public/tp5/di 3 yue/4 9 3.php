<?php 
	$a=empty($_GET['search'])?"":$_GET['search'];  

	$p=empty($_GET['p'])?1:$_GET['p'];
	$page=($p-1) * 3;



	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from category where c_name like '%$a%' limit $page,3";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from category where c_name like '%$a%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$count=$arr2['con'];
	$total=$count/3;
	//var_dump($total);

 ?>
 <form action="4 9 3.php" method="get">
 	<input type="text" name="search">
 	<input type="submit" value="搜索">
 </form>
 <table border="1">
 	<tr>
 		<th>id</th>
 		<th>分类名称</th>
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


<a href="4 9 3.php?p=<?php echo $pp ?>&search=<?php echo $a ?>">上一页</a>



 <?php for($i=1;$i<=$total;$i++){ ?>
	<a href="4 9 3.php?p=<?php echo $i ?>&search=<?php echo $a ?>"><?php echo "第".$i."页" ?></a>

 <?php } ?>
 <a href="4 9 3.php?p=<?php echo $ppp ?>&search=<?php echo $a ?>">下一页</a>