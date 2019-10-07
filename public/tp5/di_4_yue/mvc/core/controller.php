<?php 
	namespace core;
	class controller
	{
		public $vals=[];
		function get_html()
		{
			extract($this->vals);
			$module = empty($_GET['m'])?'index':$_GET['m'];
			$controller = empty($_GET['c'])?'index':$_GET['c'];
			$action = empty($_GET['a'])?'index':$_GET['a'];
			include "add/$module/view/$controller/$action.html";
		}
	
	public function assign($k,$v)
	{
		$this->vals[$k]=$v;
	}

	public function success($msg,$url)
	{
		echo "<script>alert('$msg');location.href='$url';</script>";
	}
}

 ?>