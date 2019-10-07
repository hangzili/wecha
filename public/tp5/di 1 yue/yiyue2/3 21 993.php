<?php
	header('content-type:text/html;charset=utf-8');
	//$ming=$_POST['ming'];
	//$tian=$_POST['tian'];
	$id=$_GET['id'];
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from tiku2 where id='$id'";
	//echo $sql;
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
?>
<form action="3 21 994.php" method="post">
<table border="1">
	<input type="hidden" name="id" value="<?php echo $arr['id'];?>">
	<tr>
		<td>题库名称</td>
		<td>添加人</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $q=>$w) { ?>
	<tr>
		<td><?php echo $w['ming'];?></td>
		<td><?php echo $w['tian'];?></td>
		<td><a href="3 21 992.php?id=<?php echo $w['id'];?>">删除</a>
			<a href="3 21 993.php?id=<?php echo $w['id'];?>">改变</a></td>
	</tr>
	<?php }?>
</table>
	