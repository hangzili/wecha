<?php 
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select * from ccc limit $page,2";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from ccc";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);

 ?>
 <form action=""></form>
 <table border="1">
 	<tr>
 		<td>ID</td>
 		<td>姓名</td>
 		<td>性别</td>
 		<td>爱好</td>
 		<td>班级</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach($array as $k=>$v){ ?>
 	<tr>
 		<td><?php echo $v['c_id'] ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td><?php echo $v['c_sex'] ?></td>
 		<td><?php echo $v['c_hobby'] ?></td>
 		<td><?php echo $v['c_class'] ?></td>
 		<td>
 			<a onclick="del(<?php echo $v['c_id'] ?>)" id="delid<?php echo $v['c_id'] ?>">删除</a>
 			<a href="4 28 2upd.php?c_id=<?php echo $v['c_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1;$i<=$title;$i++){ ?>
 	<a href="4 28 2list.php?p=<?php echo $i ?>"><?php echo "第".$i."页" ?></a>
 <?php } ?>
 <script type="text/javascript">
 function del(ab)
 {
 	var did=document.getElementById('delid'+ab);
 	var x= new XMLHttpRequest();
 	x.onreadystatechange=function()
 	{
 		if(x.readyState==4 && x.status==200){
 			var asd=did.parentNode.parentNode;
 			asd.style.display='none';
 		}
 	}
 	x.open('get','4 28 2del.php?pp='+ab,true);
 	x.send();
 }
 </script>