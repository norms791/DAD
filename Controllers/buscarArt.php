<?php
	/*
	 * Controlador que recibe la palabra clave de
	 * la barra de busqueda de la pagina principal
	 * y la envia al metodo del Modelo Muebles.php
	 * para obtener un arreglo de articulos que 
	 * coincidan
	 */
	 
	// toma el valor de la barra de busqueda de la pagina de inicio
	$keyword = $_GET["parametro"];
	$vacio = false;
	include_once("../Models/Muebles.php");
	session_start();
	
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		// header para usuarios con cuenta
		include("../Views/header.php");
	} else {
		// header para usuarios sin cuenta
		include("../Views/headerPrincipal.php");
	}
	// arreglo para articulos encontrados
	$muebles = Muebles::buscaMuebles($keyword);
	if(count($muebles)==0){
		// si no se encontraron articulos
		$vacio = true;
	}
	include("../Views/buscarArt.php");
?>