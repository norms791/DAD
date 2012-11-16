<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<head>
		<title>Reservaci�n</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />	
		<script>
			function validaReservacion(){
				confirm("�De verdad deseas reservar este art�culo?)");
			}
		</script>
	</head>
	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido">
		   <form action="../Controllers/confirmarReservacion.php" method="get">
			<input type="hidden" name='mueble' value='<?=$mueble->getIdMueble()?>'/>
		    <h1>Reservaci�n</h1>
			<h3>Informaci�n de la reservaci�n</h3>
			<p>Nombre:<?=$usuario->getNombre()?></p>
			<p>E-mail:<?=$usuario->getEmail()?></p>
			<p>Art�culo reservado:</p>
			<?=$mueble->getDesAbreviada()?><br/>
			<?=$mueble->getDesDetallada()?><br/>
			<?=$mueble->getUbicacion()?><br/>
			<img src='<?=$foto?>' />
			<center>
				<input type="submit" value="Reservar" class="boton" onclick="validaReservacion()"/>
			</center>
		   </form>
		</div>
		
    	
	</body>
</html>