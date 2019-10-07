<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','18099');
	$sql="select * from goods";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<th>商品名</th>
		<th>商品描述</th>
		<th>价格</th>
		<th>数量</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $k=>$v){ ?>
	<tr>
		<td><?php echo $v['goods_name'];?></td>
		<td><?php echo $v['desca'];?></td>
		<td><?php echo $v['price'];?></td>
		<td><?php echo $v['num'];?></td>
		<td>
			<a href="4 2 14.php?id=<?php echo $v['id'];?>">删除</a>
			<a href="4 2 15.php?id=<?php echo $v['id'];?>">修改</a>
		</td>
	</tr>
	<?php }?>
</table>