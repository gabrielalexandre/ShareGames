<?php
	require 'app/controllers/PagesController.php';

	$controllerName = $_GET['controller'].'Controller';
	$actionName = $_GET['action'];

	$controller = new $controllerName();
	$controller->$actionName(); 
?>