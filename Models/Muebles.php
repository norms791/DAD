<?php
	include_once("connection.php"); //Se incluye la conexion a la base de datos

	class Muebles{
		//  Variables de la clase
		private $idMueble;
		private $desAbreviada;
		private $desDetallada;
		private $ubicacion;
		private $latitud;
		private $reservado;
		private $usuario;
		
		//Constructor vacio
		//Nos va a dejar hacer una instancia de Muebles vacia
		function __construct(){
		}
			
		//Métodos que puede accesar un objeto de la clase Muebles, nos dejan hacer operaciones sobre él
		   /*Dentro del controlador se mandan llamar así: 
				1. Crear una instancia de Muebles :   $mueble = new Muebles();
				2. Se accesa el método a través de esa instancia:  $mueble->insertarMueble();  $mueble->llenaDatos(parámetro1, parámetro2,...);  etc.*/	
		
				//Nos permie llenar los datos de un objeto Muebles vacio cuando aún no tengamos el Id
				public function llenaDatos($desAbreviada, $desDetallada, $ubicacion, $latitud, $reservado, $usuario){
					$this->desAbreviada = $desAbreviada;
					$this->desDetallada = $desDetallada;
					$this->ubicacion = $ubicacion;
					$this->latitud = $latitud;
					$this->reservado = $reservado;
					$this->usuario=$usuario;
				}
				
				//Nos permite llenar los datos de un objeto Muebles vacio cuando ya conocemos el Id
				public function llenaDatosCompletos($idMueble, $desAbreviada, $desDetallada, $ubicacion,$latitud, $reservado, $usuario){
					$this->idMueble = $idMueble;
					$this->desAbreviada = $desAbreviada;
					$this->desDetallada = $desDetallada;
					$this->ubicacion = $ubicacion;
					$this->latitud = $latitud;
					$this->reservado = $reservado;
					$this->usuario=$usuario;
				}
				
				//Getters y setters
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
					
					public function getReservado(){
						return $this->reservado;
					}
					
					public function setReservado($reservado){
						$this->reservado = $reservado;
					}
				
				/* Método que inserta un objeto mueble en la base de datos, una vez que se inserta se le agrega el Id al objeto.
				 el id se obtiene con la funcion mysql_insert_id() que obtiene el id del último insert que se hizo en la base de datos. */
				public function insertarMueble(){
					global $conexion;
					$query = "insert into muebles (desAbreviada, desDetallada, ubicacion, latitud, reservado, usuario) values ('".$this->desAbreviada."', '".$this->desDetallada.
									"', '".$this->ubicacion."', ".$this->latitud.",".$this->reservado.", '".$this->usuario."')";
					if(mysql_query($query ,$conexion)){
						$this->idMueble= mysql_insert_id();
						return true;}
					else 
					  return false;
				}
				
				/*Método que nos permite marcar un mueble como reservado en la base de datos*/
				public function reservar(){
					global $conexion;					
					$query = "update muebles set reservado=1 where idMueble=".$this->idMueble;
					if(mysql_query($query, $conexion)){
						$this->setReservado(1);
						return true;
					}
					else return false;
				}		
					
		//Métodos que se puede accesar una php sin necesidad de crear un objeto Muebles
		/* En el controlador se acceden de la siguiente manera:
			1.se escribe el nombre de la clase seguido de :: y el método    Por ejemplo:  Muebles::obtenerListaMuebles()  */
			
			/* Método que sirve para obtener un mueble
				   El método recibe como parámetro el id del mueble que se quiere cargar
				   El método realiza el query y si encuentra el mueble carga todos los datos del mueble en el objeto, en caso de no
					 encontrarlo desplegará un mensaje de error*/
				public static function obtenerMueble($id){
					global $conexion;
					$query = "select * from muebles where idMueble=".$id;
					$result = mysql_query($query, $conexion);
					if($row = mysql_fetch_array($result)){
						$m = new Muebles();
						$m ->llenaDatosCompletos($row['idMueble'], $row['desAbreviada'], $row['desDetallada'] ,  $row['ubicacion'], $row['latitud'], $row['reservado'], $row['usuario']);
						return $m;
					}
					else{
						die ("No existe el mueble que buscas en la base de datos");
					}
				}
				
				//Método que permite obtener la lista de todos los muebles que hay en la base de datos
					//El método regresa un arreglo de objetos de la clase Muebles	
				public static function obtenerListaMuebles(){
					global $conexion; //Incluye la variable global conexion, que contiene la conexion a la base de datos
					$result = mysql_query("SELECT * FROM muebles",$conexion); //Ejecuta el query
					$muebles= array(); //Crea un arreglo
					while($row= mysql_fetch_array($result)){ //por cada fila que regresara el query
						$mueble = new Muebles(); //Crea un objeto Muebles vacio y después llena sus datos
						$mueble->llenaDatosCompletos($row['idMueble'], $row['desAbreviada'], $row['desDetallada'] ,  $row['ubicacion'], $row['latitud'], $row['reservado'], $row['usuario']);
						$muebles[] = $mueble;//Añade el objeto al arreglo
					}
					return $muebles;//regresa el arreglo
				}
				
				//Método que permite buscar muebles dada una palabra clave
				/* El método recibe una palabra clave de la búsqueda y revisa en la base de datos esa palabra en la descripción de los artículos
				   El método regresa un arreglo de objetos Muebles con todos los elementos de la base de datos que contuvieran esa palabra en su descripción*/
				public static function buscaMuebles($palabra){
					global $conexion;
					$query = "SELECT * FROM muebles where desDetallada like '%$palabra%' OR desAbreviada like '%$palabra%'";
					$result = mysql_query($query,$conexion);
					$muebles= array(); //Crea un arreglo
					while($row= mysql_fetch_array($result)){ //por cada fila que regresara el query
						$mueble = new Muebles(); //Crea un objeto Muebles vacio y después llena sus datos
						$mueble->llenaDatosCompletos($row['idMueble'], $row['desAbreviada'], $row['desDetallada'] ,  $row['ubicacion'], $row['latitud'], $row['reservado'], $row['usuario']);
						$muebles[] = $mueble;//Añade el objeto al arreglo
					}
					return $muebles;//regresa el arreglo
				}	
		
	}
?>