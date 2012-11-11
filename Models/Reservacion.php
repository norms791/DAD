<?php
	include_once("connection.php");
	class Reservacion{
		//  Variables globales
		private $idReservacion;
		private $idMueble;
		private $idUsuario;
		
		function __construct($idMueble, $idUsuario){
			this->$idMueble = $idMueble;
			this->$idUsuario= $idUsuario;
		}
		
		function setIdMueble($idMueble){
			this->$idMueble = $idMueble;
		}
		
		function getIdMueble(){
			return this->$idMueble;
		}
		
		function setIdUsuario($idUsuario){
			this->$idUsuario = $idUsuario;
		}
		
		function getIdUsuario(){
			return this->$idUsuario;
		}
		
	}
?>