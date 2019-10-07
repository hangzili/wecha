<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from zhousia where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<table border="1">
	<tr>
		<td>编号</td>
		<td>用户名</td>
		<td>性别</td>
		<td>年龄</td>
		<td>状态</td>
		<td>时间</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['id'];?></td>
		<td><?php echo $e['nname'];?></td>
		<td><?php echo $e['nradio'];?></td>
		<td><?php echo $e['nage'];?></td>
		<td><?php 
				if($e['zhuang']==1){
					echo '正确';
				}else{
					echo '冻结';
				}
			?></td>
		<td><?php echo $e['time'];?></td>
		<td>
			<a href="3 28 222.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 28 223.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 28 225.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>
