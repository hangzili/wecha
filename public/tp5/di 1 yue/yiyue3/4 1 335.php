<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from one where is_del=1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	//var_dump($arr);
?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>性别</td>
		<td>爱好</td>
		<td>介绍</td>
		<td>省市</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['aname'];?></td>
		<td><?php echo $e['aradio'];?></td>
		<td><?php echo $e['nhoddy'];?></td>
		<td><?php echo $e['atext'];?></td>
		<td><?php echo $e['asheng'];?></td>
		<td><?php echo $e['time'];?></td>
		<td>
			<a href="4 1 336.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="4 1 337.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="4 1 339.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>