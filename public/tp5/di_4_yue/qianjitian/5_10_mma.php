<?php 
	namespace aaa;
	include_once('5_10_mmb.php');
	class a
	{
		public $name='小黑';
		public $age=19;
	}
	$ab=new a;
	echo $ab->name;

	$ab2=new \bbb\a;
	echo $ab2->name;






















 ?>