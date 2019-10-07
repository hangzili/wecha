<?php 
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from booka where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	
?>
<table border="1">
	<tr>
		<th>编号</th>
		<th>名称</th>
		<th>作者</th>
		<th>价格</th>
		<th>分类</th>
		<th>描述</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['tname'];?></td>
		<td><?php echo $e['tauthor'];?></td>
		<td><?php echo $e['tprice'];?></td>
		<td><?php echo $e['tid'];?></td>
		<td><?php echo $e['ttext'];?></td>
		<td>
			<a href="3 28 332.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 28 333.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 28 335.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>
<a href="3 28 33.html">返回继续添加</a>