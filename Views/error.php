<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />		
	</head>
	<body>	
		<div id="contenido" style="margin-top:10%; margin-bottom: auto; height: 380px;">			
		   <form action="../Controllers/index.php" method="get" >
		   <center>
		   <h1>Error</h1>
			<?php
				if($err==1){ ?>				
						<br/>
						<h2>El usuario y/o contraseña son incorrectos</h2>
						<br/>
						<br/>
						Por favor prueba iniciar sesión una vez más o regístrate dando click <a href="../Controllers/registro.php">aquí</a>.<br/>
				<?php }
				else if($err==2){ ?>
						<br/>
						<h2>Sólo los usuarios registrados están autorizados a <?= $mensajeError ?>.</h2>
						<br/>
						<br/>
						Si ya estás registrado, por	favor inicia sesión o regístrate dando click <a href="../Controllers/registro.php">aquí</a>.<br/>
				<?php }
				else if($err==3){ ?>
						<br/>
						<h2>Esta cuenta no está validada.</h2>
						<br/>
						<br/>
						Esta cuenta no ha sido validada. Para hacerlo, por favor accede a tu cuenta de correo electrónico.
				<?php }
						?>	
				<br/><br/>
				<input type="submit" value="Inicio" class="boton"/>
			</center>
		   </form>
		</div>
		
    	
	</body>
</html>