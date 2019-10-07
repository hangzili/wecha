<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sname12 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>年龄</td>
		<td>岁数</td>
		<td>多大了</td>
		<td>爱好</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['sname1'];?></td>
		<td><?php echo $e['sname2'];?></td>
		<td><?php echo $e['sname3'];?></td>
		<td><?php echo $e['sname4'];?></td>
		<td><?php echo $e['aihao'];?></td>
		<td><?php echo $e['time'];?></td>
		<td>
			<a href="4 1 222.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="4 1 223.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="4 1 225.php?id=<?php echo $e['id'];?>">回收</a>
		</td>
	</tr>
	<?php }?>
</table>