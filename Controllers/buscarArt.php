<?php
	/* toma el valor de la barra de busqueda de la pagina de inicio */
	$keyword = $_GET["parametro"];
	session_start();
	include_once("../Models/Muebles.php"); //Se incluye la conexion a la base de datos

	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		//aqui va el header para usuarios con cuenta
		include("../Views/header.php");
	} else {
		//aqui va el header para usuarios sin cuenta
		include("../Views/headerPrincipal.php");
	}
	$muebles = Muebles::buscaMuebles($keyword);
	if($muebles){
		include("../Views/buscarArt.php");
	}
?>