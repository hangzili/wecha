<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sudent";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border="1">
	<tr>
		<td>学生id</td>
		<td>名称</td>
		<td>操作</td>
	</tr>
	<?php foreach ($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['id'];?></td>
		<td><?php echo $w['sname'];?></td>
		<td><a href="student2.php?id=<?php echo $w['id'];?>">删除</a>
			<a href="student3.php?id=<?php echo $w['id'];?>">修改</a></td>
	</tr>
	<?php } ?>
</table>