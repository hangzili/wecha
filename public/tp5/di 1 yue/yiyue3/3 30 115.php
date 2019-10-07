<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zuci2 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<th>商品名称</th>
		<th>商品价格</th>
		<th>商品描述</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['sname'];?></td>
		<td><?php echo $e['aprice'];?></td>
		<td><?php echo $e['sdesc'];?></td>
		<td>
			<a href="3 30 116.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 30 117.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 30 119.php?id=<?php echo $e['id'];?>">放入回收站</a>

		</td>
	</tr>
	<?php }?>
</table>