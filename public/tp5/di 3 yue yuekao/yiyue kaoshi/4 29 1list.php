<?php 
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from clian";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<table border="1">
 		<tr>
 			<td>ID</td>
 			<td>姓名</td>
 			<td>性别</td>
 			<td>爱好</td>
 			<td>是否提交</td>
 			<td>时间</td>
 			<td>操作</td>
 		</tr>
 		<?php 
 			$brr=array("唱歌","跳舞","游泳");
 		foreach($array as $k=>$v){ 
 			$asdf=explode(",",$v['c_hobby']);
 			$ass="";
 			foreach($asdf as $value){
 				$ass.=$brr[$value];
 			}
 			?>
 		<tr>
 			<td><?php echo $v['c_id'] ?></td>
 			<td><?php echo $v['c_name'] ?></td>
 			<td>
 				<?php 
 					if($v['c_sex']==0){
 						echo "女";
 					}else{
 						echo "男";
 					}

 				 ?>
 			</td>
 			<td><?php echo $ass ?></td>
 			<td>
 				<?php 
 					if($v['c_zhuang']==1){
 						echo "是";
 					}else{
 						echo "否";
 					}

 				 ?>
 			</td>
 			<td><?php echo date("Y-m-d H:i:s",$v['c_time']) ?></td>
 			<td></td>
 		</tr>
 		<?php } ?>
 	</table>
 </body>
 </html>