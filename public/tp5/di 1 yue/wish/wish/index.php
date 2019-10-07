<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>许愿墙</title>
	<link rel="stylesheet" href="./Css/index.css" />
	<script type="text/javascript" src='./Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='./Js/index.js'></script>
</head>

<body>
<?php 
	header("content-type:text/html;charset=utf-8");
	$link=mysqli_connect('127.0.0.1','root','root','wish') or '错误';
	$sql="select * from wish";
	$res=mysqli_query($link,$sql);
	//print_r ($res);
	while($arr=mysqli_fetch_assoc($res)){
		$array[]=$arr;
	}
?>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>
	<?php foreach($array as $k=>$y){ ?>
		<dl class='paper a1'>
			<dt>
				<span class='username'><?php echo $y['wname'];?></span>
				<span class='num'><?php echo $y['wid'];?></span>
			</dt>
			<dd class='content'><?php echo $y['wcontent'];?></dd>
			<dd class='bottom'>
				<span class='time'>今天<?php echo $y['wtime'];?></span>
				<a href="" class='close'></a>
			</dd>
		</dl>
		<?php }?>
		
	</div>

	<div id='send-form'>
		<p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
		<form action="wish.php" method="post">
			<p>
				<label for="username">昵称：</label>
				<input type="text" name='wname'>
			</p>
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
				<textarea name="wcontent" id='content'></textarea>
				
			</p>
			<!--图像域也有提交的功能  type="image"-->
			<input type="image" src="Images/send-btn.png" style="width:120px;height:50px;float:right;margin:10px;border:0;">
		</form>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>