<?php 
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from tiku";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border="1">
	<tr>
		<td>题库id</td>
		<td>题库名称</td>
		<td>题库添加人</td>
		<td>添加时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $q=>$w) {?>
	<tr>
		<td><?php echo $w['id']?></td>
		<td><?php echo $w['ming']?></td>
		<td><?php echo $w['ren']?></td>
		<td><?php echo $w['shi']?></td>
		<td><a href="3 20 222.php?id=<?php echo $w['id']?>">删除</a></td>
	</tr>
	<?php }?>
</table>
	