<?php
	include_once("../Models/Usuario.php");
	$usuario = Usuario::obtenerUsuario($_POST['usuario']);	
	if($usuario && $usuario->getContrasena()==($_POST['contra'])){
		if($usuario->estaValidado()){
			session_start();
			$_SESSION['mail'] = $usuario->getEmail();
			include("../Views/inicio.php");
		}
		else{
			$err=3;
			include("../Views/error.php");
		}
	}
	else{
		$err=1;
		include("../Views/error.php");
	}
?>