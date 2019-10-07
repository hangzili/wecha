<?php 
	$link=mysqli_connect('127.0.0.1','root','','18099');
		$p=empty($_GET['p'])?"1":$_GET['p'];
	// echo $p;
	$page_num=($p-1) * 3;
	$sql="select * from category limit $page_num,3";
	$res=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}
	
	//count()统计数据库里面的条数  *  代表市所有的数据  as 链接  con别名 （随意起的名字）
	$sql2="select count(*) as con from category";
	$res2=mysqli_query($link,$sql2);
	$arr2=mysqli_fetch_assoc($res2);
	$count=$arr2['con'];//得到的总条数
	$total=ceil ($count/3);//计算总页码
	//var_dump($total);
 ?>
 <table border="1">
 	<tr>
 		<td>编号</td>
 		<td>名称</td>
 		<td>添加人</td>
 		<td>时间</td>
 	</tr>
 	<?php foreach($array as $k=>$v){ ?>
 	<tr>
    <td><?= $v['c_id'] ?></td>
    <td><?= $v['c_name'] ?></td>
    <td><?= $v['c_man'] ?></td>
    <td><?= date("Y-m-d H:i:s",$v['c_time']) ?></td>
  </tr>
 	<?php } ?>

 </table>

 <?php

 	for($i=1;$i<=$total;$i++){
 		?>
 		<a href="4 29 1.php?p=<?php echo $i ?>"><?php echo "第".$i."页" ?></a>
 	<?php } ?>


 