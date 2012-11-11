<?php
include_once("connection.php");
class Muebles{
	//  Variables globales
	private $idMueble;
	private $desAbreviada;
	private $desDetallada;
	private $ubicacion;
	private $foto;
	private $reservado;
	private $usuario;
	
	//Constructor vacio
	function __construct(){
		echo ("se creo obj ");
	}
		
	// Constructor lleno
	public function llenaDatos($desAbreviada, $desDetallada, $ubicacion, $foto, $reservado, $usuario){
		$this->desAbreviada = $desAbreviada;
		$this->desDetallada = $desDetallada;
		$this->ubicacion = $ubicacion;
		$this->foto = $foto;
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
	
	public function getFoto(){
		return $this->foto;
	}
	
	public function setFoto($foto){
		$this->foto = $foto;
	}
	
	public function getReservado(){
		return $this->reservado;
	}
	
	public function setReservado($reservado){
		$this->reservado = $reservado;
	}
	
	public function insertarMueble(){
		global $conexion;
		$query = "insert into muebles (desAbreviada, desDetallada, ubicacion, foto, reservado, usuario) values ('".$this->desAbreviada."', '".$this->desDetallada.
						"', '".$this->ubicacion."', '".$this->foto."', ".$this->reservado.", '".$this->usuario."')";
						echo $query;
		mysql_query($query ,$conexion);
		$this->idMueble= mysql_insert_id();
	}
	
	public function cargarMueble($id){
		global $conexion;
		$query = "select * from muebles where idMueble=".$id;
		$result = mysql_query($query, $conexion);
		$row = mysql_fetch_array($result);
		$this ->idMueble = $id;
		$this ->desAbreviada = $row['desAbreviada'];
		$this ->desDetallada = $row['desDetallada'];
		$this ->ubicacion = $row['ubicacion'];
		$this ->foto = $row['foto'];
		$this ->reservado= $row['reservado'];
		$this ->usuario = $row['usuario'];		
	}
	/*
	public static function getInfoMueble($id){
		global $conexion;
		$result = sqlsrv_query($conexion,"SELECT * FROM muebles WHERE idMueble=$id");
		mysql_fetch_array($result);
	}
	
	public static function reservarMueble($id){
		global $conexion;
		$result = sqlsrv_query($conexion,"UPDATE muebles SET reservado=1 WHERE idMueble=$id");
		$row = mysql_fetch_array($result);
		this-> $idMueble;
		
	}*/
}
?>