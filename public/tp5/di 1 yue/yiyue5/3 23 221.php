<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from denglu";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	//var_dump ($arr);
	
?>
<table border="1">
	<tr>
		<td>用户名</td>
		<td>年龄</td>
		<td>信息</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['yong'];?></td>
		<td><?php echo $w['mima'];?></td>
		<td><?php echo $w['xinxi'];?></td>
		<td><a href="3 23 222.php?id=<?php echo $w['id'];?>">删除</a>
			<a href="3 23 223.php?id=<?php echo $w['id'];?>">修改</a></td>
	</tr>
	<?php }?>
</table>
