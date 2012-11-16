<?php
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		include_once("../Models/Reservacion.php");
		include_once("../Models/Muebles.php");
		
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		$mueble = new Muebles();
		//$mueble -> llenaDatos(desBreve, desCompleta)
		//$query = "INSERT INTO `muebles` (`idUsuario`, `desBreve`, `desCompleta`) VALUES ('".$usuario['idUsuario']."', '".$_POST['descBreve']."', '".$_POST['descCompleta']."')";
		//$result = mysql_query($query);
		include("../Views/anunciar.php");
	}	
	else{
		$err=2;
		$mensajeError = "Anunciar Artículos";
		include("../Views/error.php");
	}
?>


