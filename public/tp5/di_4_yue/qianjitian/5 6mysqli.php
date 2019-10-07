<?php 
	class mysql
	{
		public $link="127.0.0.1";
		public $user="root";
		public $ped="";
		public $d_name="xxoo";
		public function mysq()
		{
			$link=mysqli_connect($this->link,$this->user,$this->ped,$this->d_name);
			return $link; 
		}
		public function sql($link,$sql)
		{
			$result=mysqli_query($link,$sql);
			return $result;
		}
		public function arr($result)
		{
			$array=[];
			while($arr=mysqli_fetch_assoc($result)){
				$array[]=$arr;
			}
			return $array;
		}
	}
	// $c=new mysql;
	// $link=$c->mysq();
	// $sql="insert into class3(c_name) values('南极')";
	// $s=$c->sql($link,$sql);
	// var_dump($s);

	$a=new mysql();
	$link=$a->mysq();
	// $sql="insert into class3(c_name) values('班级')";
	// $res=$a->sql($link,$sql);

	$res=$a->sql($link,"select * from class3");
	$aaa=$a->arr($res);
	var_dump($aaa);





















// 	class mys
// 	{
// 		public $lian="127.0.0.1";
// 		public $yong="root";
// 		public $mima="";
// 		public $ku="xxoo";
// 		public function mys()
// 		{
// 			$link=mysqli_connect($this->lian,$this->yong,$this->mima,$this->ku);
// 			return $link;
// 		}
// 		public function res($link,$sql)
// 		{
// 			$result=mysqli_query($link,$sql);
// 			return $result;
// 		}
// 		public function inser($aa,$bb,$cc)
// 		{
// 			$sqla="insert into $aa($bb) values($cc)";
// 		}
// 	}

// 	$a=new mys;
// 	$link=$a->mys();
// 	$sql=$a->inser('class3','c_name','扳机');
// 	$res=$a->res($link,$sql);
// 	var_dump($res);
// 	//echo $a->inser('1','2','3');














//  ?>