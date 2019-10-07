<?php
	$p=empty($_GET['p'])?"1":$_GET['p'];
	$page=($p-1) * 2;

 	$link=mysqli_connect('127.0.0.1','root','','xxoo');
	$sql="select student2.s_id,student2.s_name,student2.s_sex,student2.s_hobby,class2.c_name from student2 join class2 where class2.id=student2.c_id limit $page,2";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}

	$sql2="select count(*) as con from student2";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$asd=$arr2['con'];
	$title=ceil($asd/2);
	// echo $title;

?>
<table border="1">
	<tr>
		<td>id</td>
		<td>姓名</td>
		<td>性别</td>
		<td>爱好</td>
		<td>所在班级</td>
		<td>操作</td>
	</tr>
		<?php $brr=array('读书','听音乐','打篮球') ?>
	<?php foreach($array as $k=>$v){ 
		$aa=explode(',',$v['s_hobby']);
		$bb="";
		foreach($aa as $value){
			$bb.=$brr[$value];
		}
		?>
	<tr>
		<td><?php echo $v['s_id'] ?></td>
		<td><?php echo $v['s_name'] ?></td>
		<td><?php 
				if($v['s_sex']==0){
					echo "女";
				}else {
					echo "男";
				}

			 ?>
		</td>
		<td><?php echo $bb ?></td>
		<td><?php echo $v['c_name'] ?></td>
		<td>
			<a href="4 23 1update.php?s_id=<?php echo $v['s_id'] ?>">修改</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php for($i=1;$i<=$title;$i++){ ?>
	<?php } ?>
	<?php 
		$aa=$p-1;
		if($aa<1){
			$aa=1;
		}
		$app=$p+1;
		if($app>$title){
			$app=$title;
		}
	
	 ?>
	 <a href="2 23 1list.php?p=1"><?php echo "首页" ?></a>
	 <a href="2 23 1list.php?p=<?php echo $aa ?>"><?php echo "上一页" ?></a>
	 <a href="2 23 1list.php?p=<?php echo $app ?>"><?php echo "下一页" ?></a>
	 <a href="2 23 1list.php?p=<?php echo $title ?>"><?php echo "尾页" ?></a>
