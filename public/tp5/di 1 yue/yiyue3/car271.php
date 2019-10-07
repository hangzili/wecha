<?php 
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from carcar where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	

	
?>
<table border="1">
	<tr>
		<td>主键名</td>
		<td>跑车名称</td>
		<td>跑车价格</td>
		<td>跑车描述</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['pname'];?></td>
		<td><?php echo $e['pprice'];?></td>
		<td><?php echo $e['pdesc'];?></td>
		<td>
			<a href="car272.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="car273.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="car275.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php } ?>
</table>