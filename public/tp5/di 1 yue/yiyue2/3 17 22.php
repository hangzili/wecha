<?php
	header("content-type:text/html;charset=utf-8");
	for($q=10;$q<=20;$q++){
		echo "$q",'<br>';
	}
echo '<br>';
	for($q1=1;$q1<=30;$q1++){
		if($q1%2==0){
			echo "$q1",'<br>';
		}
	}
echo '<br>';
	$q3=0;
	for($q2=1;$q2<=50;$q2++){
		if($q2%2==1){
			$q3=$q2+$q3;
		}
	}
	echo "$q3";
echo '<br>';
	$a2=0;
	for($a1=50;$a1<=100;$a1++){
		if($a1%3==0&&$a1%5==0){
			$a2=$a1+$a2;
		}
	}
	echo "$a2";
echo '<br>';
	$w=0;
	for($w1=30;$w1<80;$w1++){
		if($w1%5==0||$w1%3==0){
			$w=$w+$w1;
		}
	}
	echo "$w";
	
	


?>