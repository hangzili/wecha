<?php 
	// var_dump($_GET);
	$module = empty($_GET['m'])?index:$_GET['m'];
	$controller = empty($_GET['c'])?index:$_GET['c'];
	$action = empty($_GET['a'])?index:$_GET['a'];

	function my_autoload($name)
	{
		str_replace("\\","/",$name);
		include $name. ".php";
	}
	spl_autoload_register('my_autoload');
	$controller = "\\add\\{$module}\\controller\\$controller";
	$n = new $controller;
	$n->$action();


 ?>