	<?php
		try
		{
			require_once './lib/index.php';    // load app library
			
			_Controller::$config = include './lib/config.php';    // configuration app
			_View::$dir = './lib/view/';    // view folder
			_Model::$dsn = _Controller::$config['_db']['dsn'];    // database configuration 
			_Model::$user = _Controller::$config['_db']['user'];
			_Model::$password = _Controller::$config['_db']['password'];
			
			if (empty($_GET['controller'])) $_GET['controller'] = 'task';    // default controller
			if (empty($_GET['action'])) $_GET['action'] = 'index';    // default action
			
			$controller = 'controller_' . $_GET['controller'];
			$controller = new $controller;
			echo $controller->$_GET['action']();    
		}
		catch (Exception $e)
		{
			echo 'ERROR: [' . $e->getCode() . '] ' . $e->getMessage();
		}
	?>
