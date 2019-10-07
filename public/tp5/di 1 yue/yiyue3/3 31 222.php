<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from za where is_del=1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>

<table border="1">
	<tr>
		<td>商品名</td>
		<td>商品描述</td>
		<td>价格</td>
		<td>数量</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['gname']?></td>
		<td><?php echo $e['gtext']?></td>
		<td><?php echo $e['gprice']?></td>
		<td><?php echo $e['gnumber']?></td>
		<td><?php echo $e['time']?></td>
		<td>
			<a href="3 31 223.php?id=<?php echo $e['id']?>">删除</a>
			<a href="3 31 224.php?id=<?php echo $e['id']?>">修改</a>
			<a href="3 31 226.php?id=<?php echo $e['id']?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>