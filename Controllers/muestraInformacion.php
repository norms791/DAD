<?php
	/* 
	* Controlador en donde se muestra la información 
	*/ 
	session_start();
	// verificación de sesión
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Muebles.php");
		
		$mueble = Muebles::obtenerMueble($_GET['mueble']);
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		
		$doc=glob("../PicturesData/".$mueble->getIdMueble().".*");
		if(isset($doc[0]))
				$foto=$doc[0];
		include("../Views/muestraInformacion.php");
	}
	else{
		$err=2;
		$mensajeError = "Reservar Artículos";
		include("../Views/error.php");
	}
?>