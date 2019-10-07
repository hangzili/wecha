<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from xiaoshou where is_del=1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border="1">
	<tr>
		<td>客户姓名</td>
		<td>名称</td>
		<td>编号</td>
		<td>销售价格</td>
		<td>出库数量</td>
		<td>操作员</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $a=>$s){ ?>
	<tr>
		<td><?php echo $s['xingming'];?></td>
		<td><?php echo $s['mingcheng'];?></td>
		<td><?php echo $s['bianhao'];?></td>
		<td><?php echo $s['jiage'];?></td>
		<td><?php echo $s['shuliang'];?></td>
		<td><?php echo $s['ren'];?></td>
		<td><?php echo $s['time'];?></td>
		<td>
			<a href="3 28 112.php?id=<?php echo $s['id'];?>">删除</a>
			<a href="3 28 113.php?id=<?php echo $s['id'];?>">修改</a>
			<a href="3 28 115.php?id=<?php echo $s['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>