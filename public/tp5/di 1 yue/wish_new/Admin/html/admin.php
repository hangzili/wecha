<?php
header("content-type:text/html;charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<frameset rows="92,*"   border="0"  frameborder="0">
	<frame src="top.php" />
    <frameset cols="240,*">
    	<frame src="left.php" />
        <frame src="wish_list.php" name="right" />
    </frameset>
</frameset>
</html>
