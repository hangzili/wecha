<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>国内新闻</title>
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

        include('./top.php');
 ?>

<div id="main1">
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
</div>

<div class="blank20"></div>




<?php 
    $n_id=$_GET['n_id'];
    $c_name=$_GET['c_name'];
    //echo $c_name;
    $link=mysqli_connect('127.0.0.1','root','','18099');
    $sql="select news.n_id,news.n_title,news.n_time,category.c_name from category left join news on news.c_id=category.c_id where category.c_id='$n_id'";
    $res=mysqli_query($link,$sql);
    while($arr=mysqli_fetch_assoc($res)){
        $array[]=$arr;
    }


 ?>
<div class="news">
	<div class="title"><h3><?php echo $c_name ?></h3><a href="#">更多&gt;&gt;</a></div>
            <ul class="width">
                <?php 
                    foreach($array as $k=>$v){
                 ?>
        	<li>
                <span><?php echo date("Y-m-d H:i:s",$v['n_time']) ?>
                </span><a  href="news_content.php?n_id=<?php echo $v['n_id'] ?>"><?php echo $v['n_title'] ?></a>
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
