<?php
	header('content-type:text/html;charset=utf-8');
	$link=mysqli_connect('127.0.0.1','root','root','a3191') or '错误';
	$sql="select * from zhoushi";
	$res=mysqli_query($link,$sql);
	//var_dump ($res);
	$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
	

?>
<table border=1>
	<tr>
		<td>商品名称</td>
		<td>价格</td>
		<td>描述</td>
		<td>是否上架</td>
		<td>品牌</td>
		<td>操作</td>
	</tr>
	<?php foreach ($arr as $w=>$e){ ?>
	<tr>
		<td><?php echo $e['goods_name']?></td>
		<td><?php echo $e['goods_price']?></td>
		<td><?php echo $e['goods_describe']?></td>
		<td><?php echo $e['is_sale']?></td>
		<td><select>
			<option>联想</option>
			<option>华为</option>
			</select>
		</td>
		<td><a href="3 23 112.php?id=<?php echo $e['id']?>">删除</a></td>
	</tr>
	<?php } ?>
</table>
	
