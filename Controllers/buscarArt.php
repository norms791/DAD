<?php
	/*
	 * Controlador que recibe la palabra clave de
	 * la barra de busqueda de la pagina principal
	 * y la envia al metodo del Modelo Muebles.php
	 * para obtener un arreglo de articulos que 
	 * coincidan
	 */
	 
	// toma el valor de la barra de busqueda de la pagina de inicio
	//$keyword = $_GET["keyword"];
	// variable de prueba
	$keyword = "mesa";
	
	include_once("../Models/Muebles.php");
	session_start();
	if(isset($_SESSION['mail'])){
		// header para usuarios con cuenta
		include("../Views/header.php");
	} else {
		// header para usuarios sin cuenta
		include("../Views/headerPrincipal.php");
	}
	
	// arreglo para articulos encontrados
	$muebles = Muebles::buscaMuebles($keyword);
	if($muebles){
		include("../Views/buscarArt.php");
	}
?>