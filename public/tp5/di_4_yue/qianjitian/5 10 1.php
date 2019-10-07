<?php 
//  class dog
// {
// 	public $name='名字';
// 	public $age='年龄';
// 	public function __construct()
// 	{
// 		echo '输出';
// 	}
// }
// 	$d=new dog;
// 	$d->name='名字2';
// 	var_dump($d);

// 	$d1 = new dog;
// 	var_dump($d1);

// 	$d2=$d;
// 	var_dump($d2);

// 	//$d1->name='名字4';
// 	$d3= clone $d1;
// 	$d1->name='名字3';
// 	var_dump($d1);
// 	var_dump($d3);



// class dog
// {
// 	public $name="名字";
// 	public $age='5';
// 	private $money = 100000000;
// 	public function __construct()
// 	{
// 		echo '狗子';
// 	}
// 	public function __get($abcdefg)
// 	{
// 		echo $abcdefg;
// 		//echo $this->$abcdefg;
// 	}
// }
// $d=new dog;
// echo $d->name;
// echo "<br>";
// echo $d->money;
// echo "<br>";
// echo $d->namee;




// class dog
// {
// 	public $name='旺财';
// 	public $age=5;
// 	private $money=100000000;
// 	public function __construct()
// 	{
// 		echo '旺';
// 	}
// 	public function __set($xo,$ox)
// 	{
// 		echo $xo,$ox;  echo "<br>";
// 		$this->$xo=$ox;

// 	}
// }
// $d=new dog;
// $d->name='富贵';
// echo "<br>";
// var_dump($d);
// $d->money=1234;
// echo "<br>";
// var_dump($d);



// class dog
// {
// 	public $name='旺财';
// 	public $age=5;
// 	private $money = 100000000;
// 	public function __construct()
// 	{
// 		echo '旺';
// 	}
// 	public function __isset($xo)
// 	{
// 		echo '123';
// 	}
// }
// $d=new dog;
// $a=isset($d);
// var_dump($a);  返回true

// $a = isset($c);
// var_dump($a);     返回false

// $a = isset($d->name);  返回true
// var_dump($a);

// $a=isset($d->money);    返回false
// var_dump($a);







// class Dog
// {
// 	public $name = '旺财';
// 	public $age = 5;
// 	private $money = 10000;
// 	public function __construct()
// 	{
// 		echo '汪';
// 	}
// 	public function __unset($xo)
// 	{
// 		echo 123;
// 	}
// }
// 	$d= new Dog;
// 	//unset($d->name);
// 	//var_dump($d);echo "<br>";
// 	unset($d->age);  //当age有时销毁age后正常输出，没有时触发__unset
// 	var_dump($d);







// class  dog
// {
// 	public $name='旺财';
// 	public $age=5;
// 	private $money=100000000;
// 	public function __construct()
// 	{
// 		echo "网";
// 	}
// 	public function dajia()
// 	{
// 		echo '打遍天下无敌手';
// 	}
// 	public function chifan($xoo)
// 	{
// 		echo '今天吃'.$xoo;
// 	}
// 	public function __call($xo,$ox)
// 	{
// 		//echo $xo;
// 		var_dump($ox);
// 	}
// }
// $d=new dog;
// $d->dajia();
// $d->money('暴雨');
// money 在对象中调用不可用（没有）的方法时会发产生





// class dog
// {
// 		public $name = '旺财';
// 		public $age = 5;
// 		private $money = 10000;
// 		public function __construct()
// 		{
// 			echo '汪';
// 		}
// 		public function dajia()
// 		{
// 			echo '打遍天下无敌手';
// 		}
// 		private static function shuijue()
// 		{
// 			echo "晚上10点之后睡觉";
// 		}
// 		public static function __callStatic($xo,$ox)
// 		{
// 			echo $xo;
// 			var_dump($ox);
// 		}
// 	}
// 	 $d=new dog;
// 	//dog::shuijue('bcd','abc');
// 	dog::shuijue('buxing','wanyouxi');









//clone 复制对象，复制对象时__clone会被调用
// class dog
// {
// 	public $name='旺财';
// 	public $age=5;
// 	private $money=100000000;
// 	public function __construct()
// 	{
// 		echo "旺";
// 	}
// 	public function dajia()
// 	{
// 		echo "打架从来没输过";
// 	}
// 	public function __clone()
// 	{
// 		echo "阿斯顿马丁";
// 	}
// }
// $d=new dog;
// var_dump($d);echo "<br>";
// $d1=clone $d;
// var_dump($d1);  








class Dog{
		public $name = '旺财';
		public $age = 5;
		private $money = 10000;
		/*public function __construct()
		{
			echo '汪';
		}*/

		public function dajia()
		{
			echo '打遍天下无敌手';
		}

		public function __toString()
		{
			return '你在echo输出DoG de 对象';
		}
		
	}

	$d = new Dog;

	echo $d;
	// $arr = ['1',2,3];

	// var_dump($arr);

	// echo $arr;

















 ?>