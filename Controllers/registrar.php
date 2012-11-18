<?php
	include_once("../Models/Usuario.php");
	include("../Views/headerPrincipal.php");
	
	$nombre = $_POST["nombreReg"];
	$apellido = $_POST["apellReg"];
	$telefono = $_POST["telReg"];
	$email = $_POST["emailReg"];
	$pwd = $_POST["pwReg"];
	$registro = new Usuario($email, $pwd, $nombre, $apellido, $telefono, 0);
	$registro -> insertarUsuario();
	
	include("../Views/registrar.php");
?>