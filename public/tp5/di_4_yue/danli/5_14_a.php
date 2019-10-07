<?php 
	// class A
	// {
	// 	private static $obj;
	// 	protected function __construct()
	// 	{
				
	// 	}
	// 	public static function xxoo()
	// 	{
	// 		if(self::$obj=="")
	// 		{
	// 			self::$obj= new A;
	// 			return self::$obj;
	// 		}else{
	// 			return self::$obj;
	// 		}
	// 	}
	// 	public function __clone()
	// 	{
	// 		trigger_error('单例模式类，不能使用clone');die();
	// 	}
	// }
	// $a= A::xxoo();
	// var_dump($a);
	







class A
{
	private static $obj;
	protected function __construct()
	{

	}
	public static function xxoo()
	{
		if(self::$obj=="")
		{
			self::$obj=new A;
			return self::$obj;
		}else{
			return self::$obj;
		}
	}
	public function __clone()
	{
		trigger_error('单例模式内不能使用__clone');exit();
	}
}
	$a=A::xxoo();
	var_dump($a);











 ?>