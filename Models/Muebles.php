<?php
include_once("connection.php");
class Muebles{
	//  Variables globales
	private $idMueble;
	private $desAbreviada;
	private $desDetallada;
	private $ubicacion;
	private $latitud;
	private $longitud;
	private $reservado;
	private $usuario;
	
	//Constructor vacio
	function __construct(){
		echo ("se creo obj ");
	}
		
	// Constructor lleno
	public function llenaDatos($desAbreviada, $desDetallada, $ubicacion, $latitud, $longitud, $reservado, $usuario){
		$this->desAbreviada = $desAbreviada;
		$this->desDetallada = $desDetallada;
		$this->ubicacion = $ubicacion;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->reservado = $reservado;
		$this->usuario=$usuario;
	}
	
	public function llenaDatos($idMueble, $desAbreviada, $desDetallada, $ubicacion,$latitud, $longitud, $reservado, $usuario){
		$this->idMueble = $idMueble;
		$this->desAbreviada = $desAbreviada;
		$this->desDetallada = $desDetallada;
		$this->ubicacion = $ubicacion;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->reservado = $reservado;
		$this->usuario=$usuario;
		echo ("se lleno obj ");
	}
	
	public function getIdMueble(){
		return $this->idMueble;
	}
	
	public function getDesAbreviada(){
		return $this->desAbreviada;
	}
	
	public function setDesAbreviada($desAbreviada){		
		$this->desAbreviada = $desAbreviada;
	}
	
	public function getDesDetallada(){
		return $this->desDetallada;
	}
	public function setDesDetallada($desDetallada){
		$this->desDetallada = $desDetallada;
	}
	
	public function getUbicacion(){
		return $this->ubicacion;
	}
	
	public function setUbicacion($ubicacion){
		$this->ubicacion = $ubicacion;
	}
	
	public function getLatitud(){
		return $this->latitud;
	}
	
	public function setLatitud($latitud){
		$this->latitud = $latitud;
	}
	
	public function getLongitud(){
		return $this->longitud;
	}
	
	public function setLongitud($longitud){
		$this->longitud = $longitud;
	}
	
	public function getReservado(){
		return $this->reservado;
	}
	
	public function setReservado($reservado){
		$this->reservado = $reservado;
	}
	
	public function insertarMueble(){
		global $conexion;
		$query = "insert into muebles (desAbreviada, desDetallada, ubicacion, latitud, longitud, reservado, usuario) values ('".$this->desAbreviada."', '".$this->desDetallada.
						"', '".$this->ubicacion."', ".$this->$latitud.",".$this->longitud."', '".$this->reservado.", '".$this->usuario."')";
						echo $query;
		mysql_query($query ,$conexion);
		$this->idMueble= mysql_insert_id();
	}
	
	public function cargarMueble($id){
		global $conexion;
		$query = "select * from muebles where idMueble=".$id;
		$result = mysql_query($query, $conexion);
		if($row = mysql_fetch_array($result)){
			$this ->idMueble = $id;
			$this ->desAbreviada = $row['desAbreviada'];
			$this ->desDetallada = $row['desDetallada'];
			$this ->ubicacion = $row['ubicacion'];
			$this ->latitud = $row['latitud'];
			$this ->longitud= $row['longitud'];
			$this ->reservado= $row['reservado'];
			$this ->usuario = $row['usuario'];
		}
		else{
			die ("No existe el mueble que buscas en la base de datos");
		}
	}
	
	public static function obtenerListaMuebles(){
		global $conexion;
		$result = sqlsrv_query($conexion,"SELECT * FROM muebles");
		$muebles= array();
		while($row= mysql_fetch_array($result)){
			$mueble = new Muebles();
			$mueble->llenaDatosCompletos($row['idMueble'], $row['desAbreviada'], $row['desDetallada'] ,  $row['ubicacion'], $row['latitud'], $row['longitud'], $row['reservado'], $row['usuario']);
			$muebles[] = $mueble;
		}
		return $muebles;
	}
	
	public static function reservarMueble($id){
		global $conexion;
		$result = sqlsrv_query($conexion,"UPDATE muebles SET reservado=1 WHERE idMueble=$id");
		$row = mysql_fetch_array($result);
		this-> $idMueble;
		
	}*/
}
?>