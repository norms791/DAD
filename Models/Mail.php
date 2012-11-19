<?php
	include_once("../Models/Usuario.php");
	include_once("../Models/Reservacion.php");
	include_once("../Models/Muebles.php");
		
	
	class Mail{
	
		private $destino;
		
		function __construct($destino){
			$this->destino = $destino;
		}
	//enviarMailRegistro()
	//Envia un mail al usuario cuando se registra en el sistema para que valide su cuenta
	function enviarMailRegistro() {
		//******************CAMBIAR A MAIL DE ADMINISTRADOR
		$from = "A00805387@itesm.mx";
		//*********************************
		
		// Destinatario del correo
		$destino =  $this->destino;
		$to = $destino->getEmail();
		
		// Asunto
		$subject = "Registro de cuenta";
		// Encabezado del mail (necesario para que
		// no sea marcado como spam y pueda ser
		// leido por gestores de correo)
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$headers .= "To: " . $to . "\r\n";
		$headers .= "From: Reciclando Muebles, A.C. \r\n";
		// Mensaje del mail (cada linea debe tener 70 caracteres)
		$message = "
		<html>
		<head>
		<title>Registro de cuenta</title>
		</head>
		<body>
		<h2>Registro de cuenta</h2><br/>
		<h3>Estimado(a) ".$destino->getNombre()." ".$destino->getApellido().": </h3>
		<p>
		Se ha creado una cuenta para t&iacute; en el sistema de Reciclando Muebles.
		Si no ha solicitado la creaci&oacute;n de la cuenta, por favor descarte
		este correo. De lo contrario, entre en la siguiente p&aacute;gina.
		</p>
		<p>	
		<a href=\"http:/localhost/DAD/controllers/ConfirmaCuenta.php?email=".$to."\">
		Confirmar correo
		</a>
		<br/>
		<br/>
		Saludos, 
		<br/>
		<br/>
		<b>Reciclando Muebles A.C.</b>
		</p>
		</body>
		</html>";
		// Se asegura de que el mensaje tenga 70 caracteres por linea
		$message = wordwrap($message, 70);
		mail($to, $subject, $message, $headers);  
		return true;
		}
	
	// sendMailReservacion
    //Envia un mail al propietario del mueble reservado con los datos de la reservación.\	 
    function enviarCorreoReservacion($reservacion) {
	
		$mueble= Muebles::obtenerMueble($reservacion->getIdMueble());
		$cliente= Usuario::obtenerUsuario($reservacion->getIdUsuario());
		
		
		//******************CAMBIAR A MAIL DE ADMINISTRADOR
		$from = "A00805387@itesm.mx";
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
		$headers .= "From: Reciclando muebles, A.C.\r\n";
		
		
		// Mensaje del mail (cada linea debe tener 70 caracteres)
		$message = "
			<html>
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
			<head>
			<title>Se ha reservado tu art&iacute;culo</title>
			</head>
			<body>
			<h2>Aviso de reservaci&oacute;n</h2><br/>
			<h3>Estimado(a) ".$destino->getNombre()." ".$destino->getApellido().": </h3>
			Tu art&iacute;culo:<br/>
			".$mueble->getDesAbreviada()."<br/>
			Ha sido reservado por:<br/>
			Nombre: ".$cliente->getNombre()." ".$cliente->getApellido()."<b></b><br/>
			Tel&eacute;fono: ".$cliente->getTelefono()." </br>
			Email: ".$cliente->getEmail()." </br>
			
				<br/>
				<br/>
				Saludos, 
				<br/>
				<br/>
				<b>Reciclando Muebles A.C.</b>
			</p>
			</body>
			</html>";
		// Se asegura de que el mensaje tenga 70 caracteres por linea
		$message = wordwrap($message, 70);
		mail($to, $subject, $message, $headers);  
		return true;
    }
	
	}
?>
