<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from student2 where is_del=1 order by stime desc";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	//var_dump($arr);

?>
<table border="1">
	<tr>
		<th>学生主键id</th>
		<th>学生名称</th>
		<th>学生性别</th>
		<th>学生介绍</th>
		<th>是否升班</th>
		<th>入校时间</th>
		<th>操作</th>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['sname'];?></td>
		<td><?php echo $e['ssex'];?></td>
		<td><?php echo $e['sdesc'];?></td>
		<td><?php echo $e['is_shengban'];?></td>
		<td><?php echo $e['stime'];?></td>
		<td>
			<a href="3 30 222.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 30 223.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 30 225.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>