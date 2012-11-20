<?php
	/* 
	 * Controlador que valida que el usuario exista
	 *  y que la contraseña sea correcta
	 */
	include_once("../Models/Usuario.php");
	$usuario = Usuario::obtenerUsuario($_POST['usuario']);	
	if($usuario && $usuario->getContrasena()==($_POST['contra'])){
		// Si se valido correctamente el usuario, se inicia sesión
		if($usuario->estaValidado()){
			session_start();
			$_SESSION['mail'] = $usuario->getEmail();
			include("../Views/inicio.php");
		}
		else{
		// Si no se valido correctamente el usuario muestra el error
			$err=3;
			include("../Views/error.php");
		}
	}
	else{
		$err=1;
		include("../Views/error.php");
	}
?>