<?php 
	$a=empty($_GET['search'])?"":$_GET['search'];

	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select * from category where c_name like '%$a%'";
	$res=mysqli_query($link,$sql);
	$array=array();
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}


 ?>
 <form action="4 9 2.php" method="get">
	 <input type="text" name="search">
	 <input type="submit" value="搜索">
 </form>
 <table border="1">
	 <tr>
	 	<th>编号</th>
	 	<th>名称</th>
	 	<th>添加人</th>
	 	<th>时间</th>
	 <tr>
	 <?php foreach($array as $k=>$v){ ?>
	 <tr>
	 	<td><?php echo $v['c_id'] ?></td>
	 	<td><?php echo $v['c_name'] ?></td>
	 	<td><?php echo $v['c_man'] ?></td>
	 	<td><?php echo date("Y-m-d H:i:s",$v['c_time']) ?></td>
	 </tr>
	 <?php } ?>
 </table>