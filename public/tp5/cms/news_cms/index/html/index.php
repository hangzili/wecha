<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>前台首页</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>

<body>
<div id="header">
<img src="../images/logo1.png" alt="logo"/>
<ul>
	<li><a href="register.php">会员注册</a>/</li>
    <li><a href="login.php">登陆</a></li>
</ul>
</div>

<?php 
    session_start(); 
    if(empty($_SESSION['xxoo'])){
    echo "<script>alert('请先登陆');location.href='login.php'</script>";
    exit();
}
        include('./top.php');
 ?>

<div id="main1">
	<div class="title"><h3>图片新闻</h3><a href="#">更多&gt;&gt;</a></div>
    <ul>
        <?php 
            $link=mysqli_connect('127.0.0.1','root','','18099');
            $sql="select * from images limit 5";
            $res=mysqli_query($link,$sql);
            while($arr=mysqli_fetch_assoc($res)){
         ?>
        <li>
            <a href="#"><img src="<?php echo $arr['npath'] ?>" /></a>
            <p><a href="#">图片新闻</a></p>
        </li>
        <?php } ?>
    </ul>
</div>

<div class="blank20"></div>

<div class="news">
        <?php 
            $link=mysqli_connect('127.0.0.1','root','','18099');
            $sql="select * from news order by n_time desc limit 5";
            $res=mysqli_query($link,$sql);
            while($arr=mysqli_fetch_assoc($res)){
                $array[]=$arr;
            }
         ?>
	<div class="title"><h3>最新新闻</h3><a href="#">更多&gt;&gt;</a></div>
            <ul>
            <?php foreach($array as $k=>$v){ ?>
        	<li>
                <span><?php echo date("Y-m",$v['n_time']) ?></span>  
                <a  href="news_content.php?n_id=<?php echo $v['n_id'] ?>"><?php echo $v['n_title'] ?></a>
            </li>
            <?php } ?>
            </ul>
        
</div>

<div class="blank20"></div>

<div class="news">
	<div class="title"><h3>最热新闻</h3><a href="#">更多&gt;&gt;</a></div>
            <ul>
             <?php 
            $link=mysqli_connect('127.0.0.1','root','','18099');
            $sql="select * from news order by n_unm desc limit 5";
            $res=mysqli_query($link,$sql);
            while($arr=mysqli_fetch_assoc($res)){
         ?>
        	<li><span>
                <?php echo date("Y-m",$arr['n_time']) ?></span>  
                <a  href="news_content.php?n_id=<?php echo $arr['n_id'] ?>"><?php echo $arr['n_title'] ?></a>
            </li>
            <?php } ?>
            </ul>
       
</div>

<div class="blank20"></div>

<?php 

    include('./foot.php');
 ?>
</body>
</html>
