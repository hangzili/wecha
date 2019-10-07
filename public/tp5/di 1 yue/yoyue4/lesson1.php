<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from lesson";
	$rsc=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($rsc)){
		$array[]=$arr;
	}
	
	
?>

<table border="1">
	
		<tr>
			<td>课程编号</td>
			<td>课程名称</td>
			<td>课程简介</td>
			<td>操作</td>
		</tr>
	<?php foreach($array as $q=>$w){ ?>
		<tr>
			<td><?php echo $w['id'];?></td>
			<td><?php echo $w['k_name'];?></td>
			<td><?php echo $w['k_desc'];?></td>
			<td><a href="lesson2.php?id=<?php echo $w['id'];?>">删除</a>
				<a href="lesson3.php?id=<?php echo $w['id'];?>">修改</a></td>
		</tr>
		<?php }?>
	</table>
