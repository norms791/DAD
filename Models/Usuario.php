<?php
include_once("connection.php");
class Usuario{
	//  Variables globales
	private $Email;
	private $Nombre;
	private $Apellido;
	
	function __construct($Email, $Nombre, $Apellido){
		this->$Email = $Email;
		this->$Nombre = $Nombre;
		this->$Apellido = $Apellido;
	}
	
	}
?>