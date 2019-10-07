<?php 
	namespace add\admin\controller;
	use core\controller;
	class controller extends controller
	{
		public function ab()
		{
			echo 45345;
			$this->get_html();
		}
		// public function get_html()
		// {
		// 	$module = empty($_GET['m'])?index:$_GET['m'];
		// 	$controller = empty($_GET['c'])?index:$_GET['c'];
		// 	$action = empty($_GET['a'])?index:$_GET['a'];
		// 	include_once "add/$module/view/$controller/$action.html";
		// }
	}









 ?>