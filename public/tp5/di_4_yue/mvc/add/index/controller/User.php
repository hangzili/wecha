<?php 
	namespace add\index\controller;
	class User
	{
		function Usera()
		{
			$this->get_html();
		}
		function get_html()
		{
			$module = empty($_GET['m'])?index:$_GET['m'];
			$controller = empty($_GET['c'])?index:$_GET['c'];
			$action = empty($_GET['a'])?index:$_GET['a'];
			include "add/$module/view/$controller/$action.html";
		}
	}


 ?>