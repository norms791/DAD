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
	if($keyword!=""){
		$muebles = Muebles::buscaMuebles($keyword);
		if($muebles){
			for($i=0;$i<1;$i++){
				$doc=glob("../PicturesData/".$muebles[$i]->getIdMueble().".*");
				$foto[$i]=$doc[$i];
			}
		}
		$noexiste = Muebles::buscaMuebles("No Existe");
		$noc=glob("../PicturesData/".$noexiste[0]->getIdMueble().".*");
		$nofoto=$noc[0];
	} else {
		$vacio = true;
	}
	include("../Views/buscarArt.php");
?>