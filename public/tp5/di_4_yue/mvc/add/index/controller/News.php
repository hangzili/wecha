<?php 
	namespace add\index\controller;
	class News
	{
		public function User()
		{
			$this->get_html();
			
			
		}
		public function News()
		{
				$this->get_html();echo 213;		
		}
		public function get_html()
		{
			$module = empty($_GET['m'])?index:$_GET['m'];
			$controller = empty($_GET['c'])?index:$_GET['c'];
			$action = empty($_GET['a'])?index:$_GET['a'];
			include "add/$module/view/$controller/$action.html";
		}
	}









 ?>