<?php 
	$sou=empty($_GET['sou'])?"":$_GET['sou'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xo');
	$sql="select * from abc where n_name like '%$sou%' limit $page,2";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from abc where n_name like '%$sou%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$titol=ceil($asd/2);
 ?>
 <form action="4 13 lian.php" method="get">
 	<input type="text" name="sou">
 	<input type="submit" value="搜索">
 </form>
 <table border="1">
 	<tr>
 		<th>名字</th>
 		<th>头</th>
 		<th>身体</th>
 		<th>操作</th>
 	</tr>
	<?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['n_name'] ?></td>
 		<td><?php echo $v['n_title'] ?></td>
 		<td><?php echo $v['n_body'] ?></td>
 		<td>
 			<a href="">删除</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1;$i<=$titol;$i++){ ?>
 	<a href="4 13 lian.php?p=<?php echo $i ?>&sou=<?php echo $sou ?>"><?php echo "第".$i."页" ?></a>
 <?php } ?>
