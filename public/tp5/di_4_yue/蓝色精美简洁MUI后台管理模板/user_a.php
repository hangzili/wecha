<?php 
	class add
	{
		public $lin='127.0.0.1';
		public $ming='root';
		public $pwd='';
		public $ku="ada";
		public $link;
		public function __construct()
		{
			$this->link=mysqli_connect($this->lin,$this->ming,$this->pwd,$this->ku);
		}
		public function inser($sql)
		{
			$res=mysqli_query($this->link,$sql);
		}
	}





 ?>