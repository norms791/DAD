<?php
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Muebles.php");
		
		$mueble = Muebles::obtenerMueble($_GET['mueble']);
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		$due�o = Usuario::obtenerDue�o($_GET['mueble']);
		
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