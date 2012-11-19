<?php
	/*
	 * Controlador que recibe los datos
	 * del usuario de la pagina registro.php
	 * (si estos fueron validados primero) 
	 * para crear un objeto Usuario y usar
	 * el metodo para insertar los datos en
	 * la base de datos; el ultimo dato "0"
	 * es para la columna de valida y siempre
	 * es cero cuando se registra un usuario
	 */
	
	include_once("../Models/Usuario.php");
	include("../Views/headerPrincipal.php");
	
	// datos recibidos de la pagina de registro.php
	$nombre = $_POST["nombreReg"];
	$apellido = $_POST["apellReg"];
	$telefono = $_POST["telReg"];
	$email = $_POST["emailReg"];
	$pwd = $_POST["pwReg"];
	
	// se crea el objeto Usuario y se introducen los datos en la base de datos
	$registro = new Usuario($email, $pwd, $nombre, $apellido, $telefono, 0);
	$registro -> insertarUsuario();
	
	include("../Views/registrar.php");
?>