<?php
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Reservacion.php");
		include_once("../Models/Muebles.php");
		
		$mueble = Muebles::obtenerMueble($_GET['mueble']);
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		
		$doc=glob("../PicturesData/".$mueble->getIdMueble().".*");
		if(isset($doc[0]))
				$foto=$doc[0];
		else $foto= "../Pictures/img_noDisponible.jpg";
		include("../Views/reservar.php");
	}
	else{
		$err=2;
		$mensajeError = "Reservar Artículos";
		include("../Views/error.php");
	}
?>