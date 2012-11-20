<?php
	/* 
	* Controlador en donde se muestra la informaci�n 
	*/ 
	session_start();
	// verificaci�n de sesi�n
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
		$mensajeError = "Reservar Art�culos";
		include("../Views/error.php");
	}
?>