<?php 
	$so=empty($_GET['sou'])?"":$_GET['sou'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','student');
	$sql="select * from class where c_name like '%$so%' limit $page,2";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from class where c_name like '%$so%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);
 ?>
 
 <form action="4 28 1list.php" method="get">
 	<input type="text" name="sou">
 	<input type="submit" value="搜索">
 </form>
 <table border="1">
 	<tr>
 		<td>ID</td>
 		<td>姓名</td>
 		<td>性别</td>
 		<td>爱好</td>
 		<td>城市</td>
 		<td>介绍</td>
 		<td>操作</td>
 	</tr>
 	<?php 
 		$aihao=array('唱歌','跳舞','游泳');
 	foreach($array as $k=>$v){ 
 		$brr=explode(",",$v['c_hobby']);
 		$crr="";
 		foreach($brr as $value){
 			$crr.=$aihao[$value];
 		}
 		?>
 	<tr>
 		<td><?php echo $v['c_id'] ?></td>
 		<td><?php echo $v['c_name'] ?></td>
 		<td>
 			<?php 
 			if($v['c_sex']=="0"){
 				echo "女";
 			}else {
 				echo "男";
 			}
 			 ?>
 		</td>
 		<td><?php echo $crr ?></td>
 		<td>
 			<?php 
 				if($v['c_city']=='0'){	echo "北京";}
 				if($v['c_city']=='1'){	echo "上海";}
 				if($v['c_city']=='2'){	echo "深圳";}
 			 ?>
 		</td>
 		<td><?php echo $v['c_content'] ?></textarea></td>
 		<td>
 			<a onclick="shan(<?php echo $v['c_id'] ?>)" id="did<?php echo $v['c_id'] ?>">删除</a>
 			<a href="4 28 1upd.php?c_id=<?php echo $v['c_id'] ?>">修改</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php for($i=1;$i<=$title;$i++){ ?>
 <a href="4 28 1list.php?p=<?php echo $i ?>&sou=<?php echo $so ?>"><?php echo "第".$i."页" ?></a>
 <?php } ?>
 <script type="text/javascript">
 function shan(ab)
 {
 	var dell= document.getElementById('did'+ab);
 	var x=new XMLHttpRequest();
 	x.onreadystatechange=function()
 	{
 		if(x.readyState==4 && x.status==200){
 			var asdf=dell.parentNode.parentNode;
 			asdf.style.display='none';
 		}
 	} 
 	x.open('get','4 28 1del.php?aa='+ab,true);
 	x.send();

 }
 </script>