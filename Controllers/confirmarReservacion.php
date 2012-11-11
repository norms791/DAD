<?php
	include_once("../Models/Usuario.php");
	include_once("../Models/Reservacion.php");
	include_once("../Models/Muebles.php");
	
	$usuario = Usuario::obtenerUsuario($_GET['usuario']);
	$mueble = Muebles::obtenerMueble($_GET['mueble']);
	if(isset($usuario) AND isset ($mueble) AND $mueble->getReservado() ==0){
		$reservacion = new Reservacion();
		$reservacion->llenarDatos($mueble->getIdMueble(), $usuario->getEmail());
		if($reservacion->insertarReservacion()){
			if($mueble->reservar()){
				include('../Views/confirmarReservacion.php');
			}
			else{
				echo ('error al marcar el mueble como reservado');
			}
			}
		else
			echo ('No se pudo guardar la reservacion');
	}
	else{
		echo ('Error en la pagina, usuario='.isset($usuario).' mueble='.isset($mueble).' y el mueble reservado='.($mueble->getReservado != 1));
	}

?>