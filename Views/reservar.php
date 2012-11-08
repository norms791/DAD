<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />		
	</head>
	<body>
		<?php include_once("../views/header.html");?>
		<div id="contenido">
		   <form action="../Controllers/reservar.php" method="post">
		    <h1>Reservación</h1>
			<h3>Información de la reservación</h3>
			<p>Nombre:</p>
			<p>E-mail:</p>
			<p>Teléfono:</p>
			<p>Artículo reservado:</p>
			<center>
				<input type="submit" value="Reservar" class="boton"/>
			</center>
		   </form>
		</div>
		
    	
	</body>
</html>