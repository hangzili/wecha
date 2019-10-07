<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zname where is_del=1 order by time desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<th>姓名</th>
		<th>年龄</th>
		<th>工资</th>
		<th>时间</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $w=>$e)?>
	<tr>
		<td><?php echo $e['dname'];?></td>
		<td><?php echo $e['dyear'];?></td>
		<td><?php echo $e['dmoney'];?></td>
		<td><?php echo $e['time'];?></td>
		<td>
			<a href="3 31 116.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 31 117.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 31 119.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
</table>