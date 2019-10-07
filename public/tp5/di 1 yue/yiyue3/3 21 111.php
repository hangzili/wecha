<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from diannao1 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	
		
	
?>
<table border="1">
	<tr>
		<td>电脑名称</td>
		<td>电脑单价</td>
		<td>电脑型号</td>
		<td>添加人</td>
		<td>操作</td>
	</tr>
	<?php foreach ($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['ming'];?></td>
		<td><?php echo $w['dan'];?></td>
		<td><?php echo $w['xing'];?></td>
		<td><?php echo $w['ren'];?></td>
		<td><a href="3 21 112.php?id=<?php echo $w['id'];?>">删除</a>||
			<a href="3 21 113.php?id=<?php echo $w['id'];?>">修改</a>||
			<a href="3 21 115.php?id=<?php echo $w['id'];?>">放入回收站</a></td>
	</tr>
	<?php }?>
</table>
