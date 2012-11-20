<?php
// Se verifica la sesion
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Reservacion.php");
		include_once("../Models/Muebles.php");
		// Se obtiene el usuario y se crea el mueble
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		$mueble = new Muebles();
		include("../Views/anunciar.php");
	}	
	else{
		$err=2;
		$mensajeError = "Anunciar Artículos";
		include("../Views/error.php");
	}
?>


