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
	
	//Constructor vacio
	function __construct(){
	}
	
	// Constructor lleno
	public static function datos($desAbreviada, $desDetallada, $ubicacion, $foto, $reservado){
		$instance = new self();
		$instance->$desAbreviada = $desAbreviada;
		$instance->$desDetallada = $desDetallada;
		$instance->$ubicacion = $ubicacion;
		$instance->$foto = $foto;
		$instance->$reservado = $reservado;
	}
	
	public function getIdMueble(){
		return this->$idMueble;
	}
	
	public function getDesAbreviada(){
		return this->$desAbreviada;
	}
	
	public function setDesAbreviada($desAbreviada){
		this->$desAbreviada = $desAbreviada;
	}
	
	public function getDesDetallada(){
		return this->$desDetallada;
	}
	
	public function setDesDetallada($desDetallada){
		this->$desDetallada = $desDetallada;
	}
	
	public function getUbicacion(){
		return this->$ubicacion;
	}
	
	public function setUbicacion($ubicacion){
		this->$ubicacion = $ubicacion;
	}
	
	public function getFoto(){
		return this->$foto;
	}
	
	public function setFoto($foto){
		this->$foto = $foto;
	}
	
	public function getReservado(){
		return this->$reservado;
	}
	
	public function setReservado($reservado){
		this->$reservado = $reservado;
	}
	
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
		
	}
}
?>