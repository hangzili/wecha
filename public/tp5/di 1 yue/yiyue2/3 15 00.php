<?php
	header('content-type:text/html;charset=utf-8');
	/*$a='jfajofjaf';
	$b='破规矩排骨姐姐';
	echo '$a','<br>';
	echo "$b";*/


	/*function q1(){
		$e=9;
		$r=20;
		$a=$e+$r;
		echo $a;
	}
	q1();

	function s(){
		$q2=1;
		$q3=543;
		$q4=$q2+$q3;
		echo $q4;
	}
	s();*/


	/*$a=$_POST['a'];
	if($a==1){
		echo '今天是星期一';
	}
	if(empty($a)){
		echo '必须输入';
	}*/



	/*$a=$_POST['a'];
	$b=$_POST['b'];
	echo $a,'<br>';
	echo $b;
	if(empty($a)){
		echo '请输入1';
	}
	echo '<br>';
	if(empty($b)){
		echo '请输入2';
	}
	
	
	$c=$a.",".$b."\n\r";
	$d=file_put_contents('q1.txt',$c,FILE_APPEND);
	echo '输出完成';*/

	/*$ming=empty($_POST['ming'])?"请输入姓名":$_POST['ming'];
	$xing=empty($_POST['xing'])?"请输入性别":$_POST['xing'];
	$gong=empty($_POST['gong'])?"请输入工资":$_POST['gong'];
	echo $ming,"<br>";
	echo $xing,"<br>";
	echo $gong;*/
	
	/*if(empty($ming)){
		exit ("请输入姓名");
	}
	if(empty($xing)){
		exit ("请输入性别");
	}
	if(empty($gong)){
		exit ("请输入工资");
	}
	$q12=$ming.",".$xing.",".$gong."\n\r";
	$w12=file_put_contents('q1.txt',$q12,FILE_APPEND);
	echo "完成";*/
	/*于老师 16:44:15 (多人发送)
<?php
header("content-type:text/html;charset=utf-8");
/** 
 * 3  15  周五    AM   
 * 字符串    
 * 1.什么是字符串 ?
 * 字符串是由数字,字母,下划线,汉字,符号组成的串,不能是纯数字  
 * 2.字符串的定义方式   
 * ''  ""    单引号和双引号   定界符 
 * 3.单引号与双引号的区别?
 *  单引号是不能解析以$开头的变量,运行速度快(当有大量数据的时候能看到这种区别)
 *  双引号能解析以$开头的变量,运行速度慢
 *4.什么是函数?
 *
*具有一定功能的代码的集合
  *5.自定义函数的格式  
      function  函数名(){
          函数体;//自己定义的内容  比如求两个数的和
      }
      //调用  
      函数名();
 * 
*/
//使用单引号与双引号 定义字符串  
/*$str ="php";
$str1='php';
echo '我是$str'."<br>";
echo "我是$str1";*/
//自定义函数 例子展示
/*
function sum(){
    $a =5;
    $b=5;
    $c=$a+$b;
    echo $c;
}
sum();*/
/**
 * 
 *字符串函数      
 * 
 * Is_string()检测一个变量是否是字符串类型
		 Strlen()  获取字符串的长度  
		 Strpos()  获取一个字符串在另一个字符串中首次出现的位置
	     Strrpos() 获取一个字符串在一个字符串中最后一次出现的位置
		 Substr()  截取字符串
		 mb_substr() 截取中文字符串
		 Str_replace()  替换字符串
		 Str_repeat()   把一个字符串重复输出N次
		 Substr_count()  统计一个字符串在另一个字符串中出现的次数
		 Trim() 去除字符串两端的空白字符 或特殊符号
		 Rtrim() 取出字符串右边的空白字符或特殊符号 
		 Ltrim()  去除字符串左边的空白字符或特殊符号
		 Is_numeric() 检测变量是否为数字或数字字符串
 
 $ming=$_POST['ming'];
 $xing=$_POST['xing'];
 $gong=$_POST['gong'];
	//echo $ming;   字符串长度
	
 
 echo '<br>';
	 echo $xing;
 
 
 
 echo '<br>';
	echo $gong;*/
	$a="####河北省邯郸市鸡泽县##";
	
	echo trim($a,'#');
	去除两端的空白字符和特殊符号
	
	

						
	


?>

