<?php
	$sou=empty($_GET['soua'])?"":$_GET['soua'];

	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select student3.s_name,student3.s_sex,student3.s_hobby,student3.s_id,class3.c_name from student3 join class3 where student3.c_id=class3.c_id and s_name like '%$sou%' limit $page,2";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from student3 where s_name like '%$sou%'";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <form action="4 25 1list.php" method="get">
 	<input type="text" name="soua">
 	<input type="submit" value="搜索">
 </form>
 <body>
 	<table border="1">
 		<tr>
 			<td>ID</td>
 			<td>姓名</td>
 			<td>性别</td>
 			<td>爱好</td>
 			<td>班级</td>
 			<td>操作</td>
 		</tr>
 	<?php 
 		$brr=array('读书','听音乐','打篮球');
 		foreach($array as $k=>$v){ 
 		$asd=explode(",",$v['s_hobby']);
 		$ss="";
 		foreach($asd as $value){
 			$ss.=$brr[$value];
 		}
 		?>
 		<tr>
 			<td><?php echo $v['s_id'] ?></td>
 			<td><?php echo $v['s_name'] ?></td>
 			<td>
 				<?php 
 					if($v['s_sex']==0){
 						echo "女";
 					}else {
 						echo "男";
 					}
 				 ?>
 			</td>
 			<td>
 				<?php echo $ss ?>
 			</td>
 			<td><?php echo $v['c_name'] ?></td>
 			<td>
 				<a id='aa<?php echo $v['s_id'] ?>' onclick="del(<?php echo $v['s_id'] ?>)">删除</a>
 				<a href='4 25 1upd.php?s_id=<?php echo $v['s_id'] ?>'>修改</a>
 			</td>
 		</tr>
 	<?php } ?>
 	</table>
	
	<?php 
			for($i=1;$i<=$title;$i++){
				$shang=$p-1;
				if($shang<1){
					$shang=1;
				}
				$xia=$p+1;
				if($xia>$title){
					$xia=$title;
				}
	 ?>
	 <a href="4 25 1list.php?p=<?php echo $i ?>&soua=<?php echo $sou ?>"><?php echo '第'.$i.'页' ?></a>
	<?php } ?>
	<a href="4 25 1list.php?p=<?php echo $shang ?>&soua=<?php echo $sou ?>"><?php echo '上一页' ?></a>
	<a href="4 25 1list.php?p=<?php echo $xia ?>&soua=<?php echo $sou ?>"><?php echo '下一页' ?></a>
 	<script type="text/javascript">
	 	function del(ff)
	 	{
	 		var del1=document.getElementById('aa'+ff);
	 		var x=new XMLHttpRequest();
	 		x.onreadystatechange=function()
	 		{
	 			if(x.readyState==4 && x.status==200){
	 				var tt=del1.parentNode.parentNode;
	 				tt.style.display='none';
	 			}
	 		}
	 	 	x.open('get','4 25 1del.php?pp='+ff,true);
			x.send();

	 	 }
 	</script>
 </body>
 </html>