<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from car";
	$src=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($src,MYSQLI_ASSOC);
?>
<table border=1>
	<tr>
		<td>跑车名称</td>
		<td>跑车价格</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['cname'];?></td>
		<td><?php echo $e['cprice'];?></td>
		<td><a href="car_del.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="car_upd.php?id=<?php echo $e['id'];?>">修改</a>
		</td>
	</tr>
	<?php } ?>
</table>
