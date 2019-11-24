<?php
class pagesController{
		//nao esta funcionando ainda	
	function login(){
		header('Location: /sources3/app/views/login.php');
	}
	
	function usuarioInicio(){
		include 'app/views/usuarioInicio.php';
	}

}
?>
