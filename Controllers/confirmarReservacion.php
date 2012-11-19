<?php
	//RECIBE POR GET EL ID DE UN MUEBLE
	
	session_start();//Se revisa que se haya iniciado la sesión
	if(isset($_SESSION['mail'])){
		//se incluyen los modelos
		include_once("../Models/Usuario.php");
		include_once("../Models/Reservacion.php");
		include_once("../Models/Muebles.php");
		include_once("../Models/Mail.php");
		//Crea el objeto usuario con el mail de la sesión y el mueble con el id que recibe por get
		$usuario = Usuario::obtenerUsuario($_SESSION['mail']);
		$mueble = Muebles::obtenerMueble($_GET['mueble']);
		//Si existen el usuario y el mueble, y si el mueble no está reservado
		if(isset($usuario) AND isset ($mueble) AND $mueble->getReservado() ==0){
			//Crea una nuevo objeto reservacion con el ID del mueble y el EMAIL del usuario
			$reservacion = new Reservacion();
			$reservacion->llenarDatos($mueble->getIdMueble(), $usuario->getEmail());
			//Intenta insertar la reservacion en la base de datos
			if($reservacion->insertarReservacion()){
			//Si se pudo insertar la reservacion intenta reservar el mueble				
				if($mueble->reservar()){
					//Si se pudo reservar el mueble entonces crea un objeto usuario que se llama destino y es el dueño del mueble
					$destino= Usuario::obtenerUsuario($mueble->getIdUsuario());
					//Crea un objeto email con el Destino como parámetro e intenta enviar el correo de la reservacion al dueño del mueble
					$mail = new Mail($destino);
					if($mail->enviarCorreoReservacion($reservacion))
					//si se envia el mail correctamente se redirije a la vista de confirmacion
						include('../Views/confirmarReservacion.php');
					else //Si no despliega el error
						echo 'ERROR AL ENVIAR EL MAIL'); 
				}
				else{//Si no se pudo reservar el mueble despliega el error
					echo ('error al marcar el mueble como reservado');
				}
				}
			else
			//Si se pudo insertar la reservacion intenta reservar el mueble
				echo ('No se pudo guardar la reservacion');
		}
		else{
			//Si no despliega el error
			echo ('Error en la pagina, usuario='.isset($usuario).' mueble='.isset($mueble).' y el mueble reservado='.($mueble->getReservado != 1));
		}
	}
	else{//Si no esta inciada la sesion envia a la pagina de error para avisar que debe iniciar sesion para reservar
		$err=2;
		$mensajeError = "Reservar Artículos";
		include("../Views/error.php");
	}
	
	
?>