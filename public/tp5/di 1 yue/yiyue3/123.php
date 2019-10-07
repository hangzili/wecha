<?php
	header('content-type:text/html;charset=utf-8');
	$q=mysqli_connect('127.0.0.1','root','root','a3191');
	$o="select * from diannao";
	$q1=mysqli_query($q,$o);
	$u=mysqli_fetch_all($q1,MYSQLI_ASSOC);
	//print_r ($u);
?>
<table border="1">
	<tr>
		<td>电脑名称</td>
		<td>电脑单价</td>
		<td>电脑型号</td>
		<td>添加人</td>
		<td>操作</td>
	</tr>
	<?php foreach($u as $a1=>$a2){ ?>
	<tr>
		<td><?php echo $a2['c_name']; ?></td>
		<td><?php echo $a2['c_price']; ?></td>
		<td><?php echo $a2['c_number']; ?></td>
		<td><?php echo $a2['c_man']; ?></td>
		<td><a href="3 19 2221.php? id=<?php echo $a2['id']?>">删除</a></td>
	</tr>
	<?php } ?>
</table>