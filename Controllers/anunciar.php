<?php
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Reservacion.php");
		include_once("../Models/Muebles.php");
		
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		include("../Views/anunciar.php");
	}	
	else{
		$err=2;
		$mensajeError = "Anunciar Artículos";
		include("../Views/error.php");
	}
?>