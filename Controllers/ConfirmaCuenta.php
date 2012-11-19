<?php
		//Se incluyen los modelos usuario y mail
		
		include_once("../Models/Usuario.php");
		include_once("../Models/Mail.php");
		
		$usuario = Usuario::obtenerUsuario($_GET['email']);
		//Si se pudo validar la cuenta se despliega al usuario que se valido la cuenta
		if(	$usuario-> validaCuenta())
			include("../Views/validaCuenta.php");
		else{//Si no se manda el mensaje de error
			$err=4;
			include("../Views/error.php");
		}
		
?>
