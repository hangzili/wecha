<?php 
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from student3";
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
 			<td>姓名</td>
 			<td>性别</td>
 			<td>爱好</td>
 			<td>操作</td>
 		</tr>
 		<?php 
 			$brr=array("唱歌","跳舞","游泳");
 		foreach($array as $k=>$v){ 
 			$aaa=explode(",",$v['s_hobby']);
 			$tt="";
 			foreach($aaa as $value){
 				$tt.=$brr[$value];
 			}
 			?>
 		<tr>
 			<td><?php echo $v['s_name'] ?></td>
 			<td>
 				<?php 
 					if($v['s_sex']==0){
 						echo "女";
 					}else{
 						echo "男";
 					}
 				 ?>
 			</td>
 			<td>
 				<?php echo $tt ?>
 			</td>
 			<td>
 				<a onclick="shan(<?php echo $v['s_id'] ?>)" id="chu<?php echo $v['s_id'] ?>">删除</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</table>
 	<script type="text/javascript">
 	function shan(ab)
 	{
 		var shana=document.getElementById('chu'+ab);
 		var x= new XMLHttpRequest();
 		x.onreadystatechange=function()
 		{
 			if(x.readyState==4 && x.status==200){
 				var asd=shana.parentNode.parentNode;
 				asd.style.display='none';
 			}
 		}
 		x.open('get','4 27 2del.php?pp='+ab,true);
 		x.send();
 	}
 	</script>
 </body>
 </html>