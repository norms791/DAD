<?php
	include_once("../Models/Usuario.php");
	include_once("../Models/Reservacion.php");
	include_once("../Models/Muebles.php");
		
	
	class Mail{
	
		private $destino;
		
		function __construct($destino){
			$this->destino = $destino;
		}
	// sendMailReservacion
    //Envia un mail al propietario del mueble reservado con los datos de la reservación.\	 
    function enviarCorreoReservacion($reservacion) {
	
		$mueble= Muebles::obtenerMueble($reservacion->getIdMueble());
		$cliente= Usuario::obtenerUsuario($reservacion->getIdUsuario());
		
		
		//******************CAMBIAR A MAIL DE ADMINISTRADOR
		$from = "normita791@gmail.com";
		//*********************************
		
		// Destinatario del correo
		$destino =  $this->destino;
		$to = $destino->getEmail();
		
		// Asunto del correo
		$subject = "Se ha reservado tu artículo";
		
		// Encabezado del mail (necesario para que
		// no sea marcado como spam y pueda ser
		// leido por gestores de correo)
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "To: " . $to . "\r\n";
		$headers .= "From: " . $from . "\r\n";
		
		
		// Mensaje del mail (cada linea debe tener 70 caracteres)
		$message = "
			<html>
			<head>
			<title>Se ha reservado tu artículo</title>
			</head>
			<body>
			<h2>Aviso de reservación</h2><br/>
			<h3>Estimado(a) ".$destino->getNombre()." ".$destino->getApellido().": </h3>
			Tu artículo:<br/>
			".$mueble->getDesAbreviada()."<br/>
			Ha sido reservado por:<br/>
			Nombre: ".$cliente->getNombre()." ".$cliente->getApellido()."<b></b><br/>
			Teléfono: ".$cliente->getTelefono()." </br>
			Email: ".$cliente->getEmail()." </br>
			
				<br/>
				<br/>
				Saludos, 
				<br/>
				<br/>
				<b>Reciclando Muebles A.C.</b>
			</p>
			</body>";
		// Se asegura de que el mensaje tenga 70 caracteres por linea
		$message = wordwrap($message, 70);
		echo ("para:".$to);
		echo ("subject: ".$subject);
		echo ("mensaje".$message);
		// Una vez listo el correo, se envia
		$result = mail($to, $subject, $message, $headers);  
		return $result;
    }
	
	}
?>
