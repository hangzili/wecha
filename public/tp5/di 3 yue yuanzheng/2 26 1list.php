<?php 
	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select book.b_id,book.b_name,book.b_author,book.b_time,book.b_status,cate.c_name from book join cate on book.c_id=cate.c_id";
	$res=mysqli_query($link,$sql);
	$array=array();
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
 		<td>书名</td>
 		<td>作者</td>
 		<td>状态</td>
 		<td>所属分类</td>
 		<td>添加时间</td>
 		<td>操作</td>
 	</tr>
 <?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['b_id'] ?></td>
 		<td><?php echo $v['b_name'] ?></td>
 		<td><?php echo $v['b_author'] ?></td>
 		<td><?php 
 			if($v['b_status']==1){
 				echo "上架";
 			}
 		 ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td><?php echo date("Y-m-d H:i:s",$v['b_time']) ?></td>
 		<td>
 			<a onclick="aa(<?php echo $v['b_id'] ?>)" id="aid<?php echo $v['b_id'] ?>">删除</a>
 			<a href="4 26 1upd.php?b_id=<?php echo $v['b_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <script type="text/javascript">
 function aa(ab)
 {
 	var a1=document.getElementById('aid'+ab);
 	var x= new XMLHttpRequest();
 	x.onreadystatechange=function()
 	{
 		if(x.readyState==4 && x.status==200)
 		{
 			var as=a1.parentNode.parentNode;
 			as.style.display='none';
 			
 		} 
 	}
 	x.open('get','4 26upd.php?pp='+ab,true);
	x.send();
 }
 </script>
 	
 </body>
 </html>