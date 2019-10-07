<?php
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','a3191');
	$sql="select * from sanxing where is_del=1";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	//var_dump ($arr);
?>
<table border="1">
	<tr>
		<td>商品名称</td>
		<td>商品品牌</td>
		<td>商品价格</td>
		<td>是否精品</td>
		<td>是否新品</td>
		<td>是否热卖</td>
		<td>商品描述</td>
		<td>操作</td>
	</tr>
	<?php foreach($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['sname'];?></td>
		<td><?php echo $e['spai'];?></td>
		<td><?php echo $e['sprice'];?></td>
		<td><?php echo $e['jing'];?></td>
		<td><?php echo $e['xin'];?></td>
		<td><?php echo $e['re'];?></td>
		<td><?php echo $e['smiao'];?></td>
		<td>
			<a href="3 27 222.php?id=<?php echo $e['id'];?>">删除</a>
			<a href="3 27 223.php?id=<?php echo $e['id'];?>">修改</a>
			<a href="3 27 225.php?id=<?php echo $e['id'];?>">放入回收站</a>
		</td>
	</tr>
	<?php }?>
</table>