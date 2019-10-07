<?php
	header('content-type:text/html;charset=utf-8');
	$tu=$_POST['tu'];
	$jia=$_POST['jia'];
	$shu=$_POST['shu'];
	$shi=empty($_POST['shi'])?"":$_POST['shi'];
	
	
	 
?>
	<input type="text"><input type="submit">
	<table border="1">
		<tr>
			<td>图书id</td>
			<td>名称</td>
			<td>价格</td>
			<td>数量</td>
			<td>是否上架</td>
			<td>操作</td>
		</tr>
		<tr>
			<td>1</td>
			<td><?php 
					if(strlen($tu)<18){
				echo '必须大于6位';
					}
				if(strlen($tu)>18){
					echo "$tu";
					}?></td>
			<td>
					<?php 
				if(Is_numeric($jia)<1){
					echo "必须是数字";
				 }else {
					echo "$jia";
				 }
				 ?>
			</td>
			<td><?php echo $shu?>
			</td>
			<td><?php echo $shi?></td>
			<td><a href="">删除 修改</a></td>
		</tr>
	</table>