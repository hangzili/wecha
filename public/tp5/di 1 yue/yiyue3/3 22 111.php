<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from tiku3 where is_del=1";
	$res=mysqli_query($link,$sql);
	//print_r ($res);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border=1>
	<tr>
		<td>题库id</td>
		<td>题库名称</td>
		<td>题库添加人</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['nname'];?></td>
		<td><?php echo $e['nman'];?></td>
		<td><?php echo $e['ntime'];?></td>
		<td><a href="3 22 112.php?id=<?php echo $e['id'];?>">删除</a>||
			<a href="3 22 113.php?id=<?php echo $e['id'];?>">修改</a>||
			<a href="3 22 115.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>

		