<div id="nav">
<ul>
	<li ><a href="index.php"  class="active">首页</a></li>
	<?php 
		$link=mysqli_connect('127.0.0.1','root','','18099');
		$sql="select c_name,c_id from category";
		$res=mysqli_query($link,$sql);
		$array=array();
		while($arr=mysqli_fetch_assoc($res)){
			
	 ?>
    <li><a href="index_list.php?n_id=<?php echo $arr['c_id'] ?>&c_name=<?php echo $arr['c_name'] ?>"><?php echo $arr['c_name'] ?></a></li>
    <?php } ?>
</ul>
</div>
<div class="blank20"></div>
