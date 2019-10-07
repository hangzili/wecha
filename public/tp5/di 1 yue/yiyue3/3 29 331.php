<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from yuan1 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>员工姓名</td>
		<td>年龄</td>
		<td>性别</td>
		<td>邮箱</td>
		<td>电话</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['yname'];?></td>
		<td><?php echo $e['year'];?></td>
		<td><?php echo $e['yradio'];?></td>
		<td><?php echo $e['yemail'];?></td>
		<td><?php echo $e['ytel'];?></td>
		<td><?php echo $e['time'];?></td>
		<td>
			<a href="3 29 332.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 29 333.php?id=<?php echo $e['id'];?>">放入回收站</a>
			<a href="3 29 334.php?id=<?php echo $e['id'];?>">修改</a>
		</td>
	</tr>
	<?php }?>
</table>