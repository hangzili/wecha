<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '失败';
	$sql="select * from shouji";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>姓名</td>
		<td>手机号</td>
		<td>用户</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $q=>$w){ ?>
	<tr>
		<td><?php echo $w['xing'];?></td>
		<td><?php echo $w['hao'];?></td>
		<td><?php echo $w['yong'];?></td>
		<td><?php echo $w['shi'];?></td>
		<td><a href="3 20 112.php?id=<?php echo $w['id'];?>">删除</a></td>
	</tr>
	<?php } ?>
	</table>