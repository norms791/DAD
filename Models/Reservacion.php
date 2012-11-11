<?php
	include_once("connection.php"); //Se incluye la conexion a la base de datos
	
	class Reservacion{
		//  Variables de la clase
		private $idReservacion;
		private $idMueble;
		private $idUsuario;
		
		//Método que te permite crear una instancia de reservacion vacia
		function __construct(){
		}
		///Métodos que puede accesar un objeto de la clase Reservacion, nos dejan hacer operaciones sobre él
		   /*Dentro del controlador se mandan llamar así: 
				1. Crear una instancia de Reservacion :   $reservacion = new Reservacion();
				2. Se accesa el método a través de esa instancia:  $reservacion->insertarReservacion();  $reservacion->llenarDatos(); */
				
				//Metodo que nos permite llenar los datos que conocemos inicialmente de un objeto reservacion el idMueble y el idUsuario
				function llenarDatos($idMueble, $idUsuario){
					$this->idMueble = $idMueble;
					$this->idUsuario= $idUsuario;
				}
				
				function llenarDatosCompletos($idReservacion, $idMueble, $idUsuario){
					$this->idReservacion = $idReservacion;
					$this->idMueble = $idMueble;
					$this->idUsuario= $idUsuario;
				}
				
				//GETTERS Y SETTERS
				function setIdMueble($idMueble){
					$this->idMueble = $idMueble;
				}
				
				function getIdMueble(){
					return $this->idMueble;
				}
				
				function setIdUsuario($idUsuario){
					$this->idUsuario = $idUsuario;
				}
				
				function getIdUsuario(){
					return $this->idUsuario;
				}
				
				function getIdReservacion(){
					return $this->idReservacion;
				}
				
				//Método que permite crear una reservacion si el articulo no habia sido reservado previamente
				function insertarReservacion(){
					global $conexion;
					$query = "Insert into reservacion (idMueble, idUsuario) values (".$this->idMueble.", '".$this->idUsuario."')";
					if(mysql_query($query, $conexion)){
						$this->idReservacion = mysql_insert_id();
						return true;}
					else
						return false;
				}
				
				
		//Métodos que se puede accesar desde una clase sin necesidad de crear un objeto Reservacion
		/* En el controlador se acceden de la siguiente manera:
			1.se escribe el nombre de la clase seguido de :: y el método    Por ejemplo:  Reservacion::obtenerReservacion()  */
			
				//Metodo que obtiene un objeto reservacion dado un id de la reservacion
				public static function obtenerReservacion($idReservacion){
					global $conexion;
					$query = "select * from reservacion where idReservacion= $idReservacion";
					$result= mysql_query($query, $conexion);
					if($row= mysql_fetch_array($result)){
						$reservacion = new Reservacion();
						$reservacion-> llenarDatosCompletos($row['idReservacion'], $row['idMueble'], $row['idUsuario']);
						return $reservacion;
					}
					else return null;	
				}
		
	}
?>