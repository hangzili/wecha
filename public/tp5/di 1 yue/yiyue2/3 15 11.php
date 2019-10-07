<?php
	header('content-type:text/html;charset=utf-8');
	
	for($q1=10;$q1<20;$q1++){
		echo $q1.'<br>';
	}
echo '<br>';


	for($q2=1;$q2<30;$q2++){
		if($q2%2==0){
			echo $q2.'<br>';
		}
	}


echo '<br>';

	
	for($q3=10;$q3<50;$q3++){
		if($q3%2==1){
			echo $q3.'<br>';
		}
		
	}

echo '<br>';
	$q5=0;
	for($q4=1;$q4<50;$q4++){
		if($q4%2==0){
			$q5=$q4+$q5;
		}
	}
	echo $q5;
echo '<br>';
	$w1=0;
	for($w2=50;$w2<80;$w2++){
		if($w2%2==1){
			$w1=$w1+$w2;
		}
	}
	echo $w1;
echo '<br>';
	for($w3=1;$w3<100;$w3++){
		if($w3%2==0||$w3%5==0){
			echo $w3.'<br>';
		}
	}
echo '<br>';
	for($w4=50;$w4<100;$w4++){
		if($w4%3==0&&$w4%5==0){
			echo $w4.'<br>';
		}
	}
echo '<br>';
	$a2=0;
	for($a1=30;$a1<80;$a1++){
		if($a1%5==0||$a1%3==0){
			$a2=$a1+$a2;
		}
	}
	echo $a2;
	
?>