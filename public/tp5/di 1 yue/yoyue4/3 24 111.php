<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zhou1 where is_del=1";
	$rsc=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($rsc,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<th>姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>信息</th>
		<th>身高</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['sname'];?></td>
		<td><?php echo $w['radio'];?></td>
		<td><?php echo $w['sage'];?></td>
		<td><?php echo $w['sxinxi'];?></td>
		<td><?php echo $w['sgao'];?></td>
		<td><?php echo $w['datea'];?></td>
		<td><a href="3 24 112.php?id=<?php echo $w['id'];?>">删除</a>
			<a href="3 24 113.php?id=<?php echo $w['id'];?>">修改</a>
			<a href="3 24 115.php?id=<?php echo $w['id'];?>">放入回收站</a></td>
	</tr>
	<?php } ?>
</table>



