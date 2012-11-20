<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />		
	</head>
	<body>
<!-- Forma para verificar que la reservación fue exitosa-->
		<?php include_once("../views/header.php");?>
		<div id="contenido">
		   <form action="../Controllers/index.php" method="get">
		   <h1>Se ha realizado la reservacion</h1>
		   
		   <center>
				<input type="submit" value="Volver" class="boton"/>
			</center>
		   </form>
		</div>
	</body>
</html>