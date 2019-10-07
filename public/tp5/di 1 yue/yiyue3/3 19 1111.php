<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from tushu";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>图书id</td>
		<td>名称</td>
		<td>价格</td>
		<td>数量</td>
		<td>是否上架</td>
		<td>操作</td>
	</tr>
	<?php foreach ($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['id'];?></td>
		<td><?php echo $w['b_name'];?></td>
		<td><?php echo $w['b_price'];?></td>
		<td><?php echo $w['b_shu'];?></td>
		<td><?php echo $w['shi'];?></td>
		<td><a href="3 19 1112.php?id=<?php echo $w['id'];?>">删除</a></td>
	</tr>
	<?php }?>
</table>
