<?php
	header('content-type:text/html;charset=utf-8');
	$q=0;
	for($a=50;$a<=80;$a++){
		if($a%2==1){
			$q=$q+$a;
		}
	}
	
	echo $q;
echo '<br>';

	for($w=1;$w<100;$w++){
		if($w%2==0||$w%5==0){
			echo $w,'<br>';
		}
	
	}
	echo '<br>';
	for($e=50;$e<=100;$e++){
		if($e%3==0&&$e%5==0){
			echo $e,'<br>';
		}
	}
echo '<br>';
	$u=0;
for($r=30;$r<80;$r++){
if($r%5==0||$r%3==0){
		$u=$u+$r;
	}
}
echo $u;

?>