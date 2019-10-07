<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from shi1 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	//var_dump ($arr);
?>
<table border="1">
	<tr>
		<th>商品名称</th>
		<th>商品描述</th>
		<th>商品价格</th>
		<th>商品数量</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['sname'];?></td>
		<td><?php echo $e['stext'];?></td>
		<td><?php echo $e['sprice'];?></td>
		<td><?php echo $e['snumber'];?></td>
		<td>
			<a href="4 1 114.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="4 1 115.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="4 1 117.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>