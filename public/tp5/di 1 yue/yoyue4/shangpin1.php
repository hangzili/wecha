<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from goods where is_del=1";
	$rsc=mysqli_query($link,$sql);
	$scc=mysqli_fetch_all($rsc,MYSQLI_ASSOC);
?>
<table border=1>
	<tr>
		<td>商品名</td>
		<td>商品描述</td>
		<td>价格</td>
		<td>数量</td>
		<td>操作</td>
	</tr>
	<?php foreach($scc as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['goods_name'];?></td>     
		<td><?php echo $w['desca'];?></td>
		<td><?php echo $w['price'];?></td>
		<td><?php echo $w['num'];?></td>
		<td><a href="shangpin2.php?id=<?php echo $w['id'];?>">删除</a>
			<a href="shangpin3.php?id=<?php echo $w['id'];?>">修改</a>
			<a href="shangpin5.php?id=<?php echo $w['id'];?>">放入回收站</a></td>
	</tr>
	<?php } ?>
</table>
