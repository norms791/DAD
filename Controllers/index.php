<?php
	include_once("../Models/Usuario.php");
	session_start();
	if(isset($_SESSION['mail'])){
		$usuario = Usuario::obtenerUsuario($_SESSION['mail']);
		include("../Views/inicio.php");
	}
	else{
		include("../Views/index.php");
	}
?>