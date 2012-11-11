<?php
	include_once("../Models/Usuario.php");
	include_once("../Models/Reservacion.php");
	include_once("../Models/Muebles.php");
	
	$mueble = Muebles::obtenerMueble($_GET['mueble']);
	$usuario = Usuario::obtenerUsuario($_GET['usuario']);
	$doc=glob("../PicturesData/".$mueble->getIdMueble().".*");
	if(isset($doc[0]))
			$foto=$doc[0];
	include("../Views/reservar.php");
?>