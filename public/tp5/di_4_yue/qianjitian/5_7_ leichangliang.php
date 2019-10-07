<?php 
	// class abc
	// {
	// 	const AB='123456';
	// 	public function abcd()
	// 	{
	// 		echo self::AB;
	// 		echo abc::AB;

	// 	}  
	// }
	// $a=new abc;
	// echo $a->abcd();
	// echo abc::AB;

//phpinfo();







	// class abc
	// {
	// 	public static $A='123';
	// 	public function ab()
	// 	{
	// 		echo abc::$A;
	// 		echo self::$A;
	// 	}
	// }
	// echo abc::$A;
	// echo abc::$A;
 // abc::ab();





// class a
// {
// 	const ab='123';
// 	public function abc()
// 	{
// 		echo self::ab;
// 	}
// }
//echo a::ab;


// class a
// {
// 	public static $ab='1234';
// 	public static function abc()
// 	{
// 		echo a::$ab;
// 	}
// }
// //echo a::$ab;
// echo a::abc();











Class mingren
	{
		public $name = 'mingren';
		public $age = 30;
		protected $money=100000000;

		public static $mi_static = 101;

		public static function chi()   //---------------------------静态成员  chi
		{
			echo "吃这件事我必须亲历亲为！";
		} 

		public static function shui()   //--------------------------静态成员  shui
		{
			echo '睡这件事我也只能自己做！';
			//$this->dajia();  普通方法可以调用静态成员，静态成员不可以调用普通方法
			//self::tiaoshui();
		}

		public function dajia()   //-------------------------------普通类 dajia
		{
			echo '打架这种事，我才不会干，都让他们干吧。';
		}

		public function tiaoshui()   //---------------------------普通类tiaoshui
		{
			echo '挑水这种事，就让这些傀儡干吧！';
			//$this->chi();   
			self::shui();           
		}
	}
	//echo mingren::tiaoshui();   普通方法内没有this关键字可以通过静态方法调用，要是由就不行了
	 mingren::shui();   
 ?>