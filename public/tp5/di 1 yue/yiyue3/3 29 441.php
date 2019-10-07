<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from book2 where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<table border="1">
	<tr>
		<td>申请人姓名</td>
		<td>银行卡号</td>
		<td>申请额度</td>
		<td>申请人手机号</td>
		<td>申请人手机</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['sname'];?></td>
		<td><?php echo $e['yinhang'];?></td>
		<td><?php echo $e['number'];?></td>
		<td><?php echo $e['money'];?></td>
		<td><?php echo $e['tel'];?></td>
		<td>
			<a href="3 29 442.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 29 443.php?id=<?php echo $e['id'];?>">放入回收站</a>
			<a href="3 29 444.php?id=<?php echo $e['id'];?>">修改</a>
		</td>
	</tr>
	<?php }?>
</table>