<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from lian1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border="1">
	<tr>
		<td>用户id</td>
		<td>用户名</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['yname'];?></td>
		<td><?php echo $e['time'];?></td>
		<td><a href="3 26 112.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 26 113.php?id=<?php echo $e['id'];?>">修改</a></td>
	</tr>
	<?php }?>
</table>