<?php 
	// class mingren
	// {
	// 	public function chifan()
	// 	{
	// 		echo "吃饭";
	// 	}
	// 	public static function shuijiao()
	// 	{
			//echo "睡觉";
			// $this->chifan();  1
			//self::chifan();    2
			//self::chifan();    4
			 // $this->chifan();  3
			 // $this->chifan();  5
	// 	}
	// }
	// echo mingren::shuijiao();   1  不对
	//echo mingren::shuijiao();    2   对
	// $a=new mingren;              3
	// echo $a->shuijiao();         3   不对
	 // $a=new mingren;             
	 // echo $a->shuijiao();        4  对
	// $a=new mingren;             
	//   echo $a->shuijiao();       5 不对
















 // class mysql
 // {
 // 	public $host = '127.0.0.1';//
 // 	public $user = 'root'; 
 // 	public $pwd = '';
 // 	public $ku = 'ku';
 // 		public function link()
 // 		{
 // 			$link = mysqli_connect($this->host,$this->user,$this->pwd,$this->ku);
 // 			return $link;
 // 		}
 // 		public function add($link,$sql)
 // 		{
 // 			$res = mysqli_query($link,$sql);
 // 			return $res;
 // 		}

	// 	 public function delete($link,$sql)
 // 		{
 // 			$res = mysqli_query($link,$sql);
 // 			return $res;
 // 		}

 // 		 public function update($link,$sql)
 // 		{
 // 			$res = mysqli_query($link,$sql);
 // 			return $res;
 // 		}
 // 		 public function select($link,$sql)
 // 		{
 // 			$res = mysqli_query($link,$sql);
 // 			$array = array();
 // 			while($arr = mysqli_fetch_assoc($res))
 // 			{
 // 				$array[] = $arr;
 // 			}
 // 			return $array;
 // 		}
 // }
 //  $c = new mysql();
  
 

 ?>

<?php 
	class qiche
	{
		public function aodi()
		{
			echo "奥迪";
			echo self::dazhong();
			echo $this->dazhong();
		}
		public static function dazhong()
		{
			echo "大众";
		}
	}
	// qiche::aodi();
	$a=new qiche;
	$a->aodi();

 ?>
