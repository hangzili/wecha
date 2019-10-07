<?php 
	$sou=empty($_GET['sou'])?"":$_GET['sou'];
	

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 3;
	//echo $page;

	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select tt.t_name,pp.p_titte,pp.p_content,pp.p_man,pp.p_id from tt join pp where t_name like '%$sou%' limit $page,3";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from tt where t_name like '%$sou%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/3);
	
 ?>
 <form action="4 15 lian_list.php" method="get">
 <input type="text" name="sou">
 <input type="submit" value="搜素">
 </form>
 <table border="1">
 	<tr>
 		<td>添加名字</td>
 		<td>标题</td>
 		<td>分类</td>
 		<td>添加人</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['t_name'] ?></td>
 		<td><?php echo $v['p_titte'] ?></td>
 		<td><?php echo $v['p_content'] ?></td>
 		<td><?php echo $v['p_man'] ?></td>
 		<td>
 			<a href="4 15 lian_xiu.php?p_id=<?php echo $v['p_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1;$i<=$title;$i++){ ?>
		<a href="4 15 lian_list.php?p=<?php echo $i ?>&sou=<?php echo $sou ?>"><?php echo "第".$i."页" ?></a>
 <?php } ?>