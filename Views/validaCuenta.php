<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />		
	</head>
	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido">
		   <form action="../Controllers/index.php" method="get">
		   <h1>Se ha confirmado exitosamente la cuenta de correo <? = $usuario->getEmail() ?></h1>
		   Ahora puedes iniciar sesión en el sistema.
		   
		   <center>
				<input type="submit" value="Volver" class="boton"/>
			</center>
		   </form>
		</div>
	</body>
</html>