<?php

include_once("../Models/Usuario.php");
include_once("../Models/Reservacion.php");
include_once("../Models/Muebles.php");

$usuario = new Usuario('jaun@gmail.com', 'normaE','Norma', 'Escobedo');
if($usuario->insertarUsuario()){
	
$mueble = new Muebles();
$mueble-> llenaDatos('Mesa fea', 'Mesa bonita y roja y con 9mil patas', 'tangamandapio', 'latitud', 0, $usuario->getEmail());

	if($mueble->insertarMueble()){
		$reservacion = new Reservacion ();
		$reservacion-> llenarDatos ($mueble->getIdMueble(), $usuario->getEmail());
		
		if($reservacion->insertarReservacion()){
			$reserva = Reservacion::obtenerReservacion($reservacion->getIdReservacion());
			echo $reserva-> getIdReservacion();
			$muebler = Muebles::obtenerMueble($reserva->getIdMueble());
			$usuarior = Usuario::obtenerUsuario($reserva->getIdUsuario());
			echo $muebler->getDesAbreviada();
			echo $usuarior->getNombre();
		}
		else{
			echo('fallo insetar reservacion');
		}
	}
	else die ('fallo insertar mueble');
}
else die('fallo insertar usuario');

//En caso de que ya estuviera la vista, aqui se incluiría y en la vista se usarian las variables usando tags de php
//por ejemplo si quisiera desplefar en un párrafo html la descripcion abreviada de la variable $muebler en un párrafo se haría asi
//    <p><?=$muebler->getDesbreviada()? ></p>      
?>  

