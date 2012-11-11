<?php
	include_once("connection.php"); //Se incluye la conexion a la base de datos

	class Usuario{
		//  Variables de la clase
		private $Email;
		private $contrasena;
		private $nombre;
		private $apellido;
		
		//Método Constructor
		function __construct($Email, $contrasena, $Nombre, $Apellido){
			$this->Email = $Email;
			$this->contrasena= $contrasena;
			$this->nombre = $Nombre;
			$this->apellido = $Apellido;
		}
		
		//Métodos que puede accesar un objeto de la clase Usuario, nos dejan hacer operaciones sobre él
		/*Dentro del controlador se mandan llamar así: 
			1. Crear una instancia de Usuario:   $usuario = new Usuario();
			2. Se accesa el método a través de esa instancia:  $usuario->insertarUsuario(); $usuario->getName(); etc.*/	
		
			//GETTERS Y SETTERS
			public function getEmail(){
				return $this->Email;
			}
			public function getNombre(){
				return $this->nombre;
			}
			public function getApellido(){
				return $this->apellido;
			}			
			public function getContrasena(){
				return $this->contrasena;
			}			
			public function setContrasena($Contrasena){
				 $this->contrasena= $Contrasena;
			}
			public function setEmail($Email){
				 $this->Email= $Email;
			}
			public function setNombre($Nombre){
				 $this->nombre= $Nombre;
			}
			public function setApellido($Apellido){
				 $this->apellido= $Apellido;
			}
			
			//Método que permite insertar un usuario en la base de datos
			public function insertarUsuario(){
				global $conexion; //Se incluye la variable global conexion que tiene la conexion a la base de datos
				$query= "Insert into usuario values ('".$this->Email."', '".$this->contrasena."', '".$this->nombre."', '".$this->apellido."')";
				if(mysql_query($query, $conexion))
					return true;
				else 
					return false;					
			}
		
		//Métodos que se pueden acceder fuera de la clase  sin necesidad de crear una instancia de tipo Usuario
		/* En el controlador se acceden de la siguiente manera:
			1.se escribe el nombre de la clase seguido de :: y el método  por ejemplo Usuario::obtenerUsuario('correo@correo.com');  */
		
			//Método que nos regresa un objeto usuario dada un correo electrónico
			public static function obtenerUsuario($email){
				global $conexion;
				$result= mysql_query("select * from usuario where Email = '$email'",$conexion);
				$usuario= null;
				if($row=mysql_fetch_array($result)){
					$usuario = new Usuario($row['Email'], $row['contrasena'], $row['Nombre'], $row['Apellido']);
				}
				else
					die("El usuario que buscas no existe en la base de datos");
				return $usuario;
			}
			
			//Método que nos dice si un usuario existe en la base de datos dado un correo electrónico
			public static function existeUsuario($email){
				global $conexion;
				$result= mysql_query("select * from usuario where Email = '$email'",$conexion);
				$existe= false;
				if($row=mysql_fetch_array($result)){
					$existe = true;
				}
				else
					$existe= false;
				return $existe;
			}
			
			//Método que nos permite validar si la contraseña de un usuario es correcta
			public static function validaUsuario($email, $contrasena){
				global $conexion;
				$result= mysql_query("select * from usuario where Email = '$email' AND contrasena= '$contrasena'",$conexion);
				$existe= false;
				if($row=mysql_fetch_array($result)){
					$existe = true;
				}
				else
					$existe= false;
				return $existe;
			}
	}
?>