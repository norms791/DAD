<?php
	/* Controlador que sirve para modificar al usuario
	   Recibe por GET el nombre del parámetro que se le va a modificar y el valor que se le va a poner 
	*/
	//Antes que nada se valida que haya una sesión iniciada
	session_start();
	if(isset($_SESSION['mail'])){
		//Se incluye el modelo Usuario
		include_once("../Models/Usuario.php"); 
		
		//Parámetros que recibe por GET
		$campo = $_GET['campo'];
		$valor = $_GET['valor'];
		
		//Se crea un objeto Usuario con el id de la sesion
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		
		/*Dependiendo del campo que se quiera modificar se manda llamar al método de la clase Usuario
		  que está encargado de modificar ese campo.*/
		if($campo=='nombre'){
			$usuario->updateNombre($valor);
		}
		else if($campo=='apellido'){
			$usuario->updateApellido($valor);
		}
		else if($campo=='telefono'){
			$usuario->updateTelefono($valor);
		}
	}
	else
		echo 'Error, no puedes modificar un usuario porque no has iniciado sesión';
?>