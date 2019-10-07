<?php 
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from kecheng";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>名称</td>
		<td>价格</td>
		<td>是否</td>
		<td>讲师</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $q=>$w) {?>
	<tr>
		<td><?php echo$w['ming'];?></td>
		<td><?php echo$w['jia'];?></td>
		<td><?php echo$w['shi'];?></td>
		<td><?php echo$w['jiang'];?></td>
		<td><?php echo$w['shijian'];?></td>
		<td><a href="3 20 333.php?id=<?php echo$w['id']?>">删除</a></td>
	</tr>
	<?php }?>
</table>
