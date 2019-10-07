<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章发布</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body>
<div id="header">
<img src="../images/logo1.png" alt="logo"/>
<ul>
	<li><a href="">会员注册</a>/</li>
    <li><a href="login.php">登陆</a></li>
</ul>
</div>
<?php 
        include('./top.php');
 ?>
<div class="blank20"></div>
<div class="article">

<?php 
	$n_id=$_GET['n_id'];
	$link=mysqli_connect('127.0.0.1','root','','18099');
	$sql="select n_title,n_content from news where n_id='$n_id'";
	$res=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($res);
 ?>

<h3><?php echo $arr['n_title'] ?></h3>
<p><?php echo $arr['n_content'] ?></p>


</div>
</div>
<form action="news_content_do.php" method="post">
	<h2>评论</h2>
	<input type="hidden" name="n_id" value=<?php echo $n_id ?> />
	<textarea name="com_content" cols="115" rows="10"></textarea>
	<input type="submit" value="提交评论" />
</form>
<table border="1">
	<tr>
		<td>评论人</td>
		<td>评论内容</td>
		<td>评论时间</td>
	</tr>
	<?php 
		$sql2="select user.user_name,comment.com_content,comment.com_time from user join comment on user.user_id=comment.user_id where comment.news_id=$n_id";
		$res2=mysqli_query($link,$sql2);
		while($arr=mysqli_fetch_assoc($res2)){
	 ?>
	<tr>
		<td><?php echo $arr['user_name'] ?></td>
		<td><?php echo $arr['com_content'] ?></td>
		<td><?php echo date("Y-m-d h:i:s",$arr['com_time0']) ?></td>
	</tr>
	<?php } ?>
</table>
<div class="blank20"></div>

<?php 

    include('./foot.php');
 ?>

</body>
</html>
