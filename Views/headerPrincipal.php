<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Reciclando muebles</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="../JavaScripts/menu.js"></script>
	</head>
	<body>
		<a href="../Controllers/index.php"><img id="logo" src="../Pictures/logo.png" alt="Reciclando Muebles A.C."/></a>
		<form action="../Controllers/login.php" method="post"/>
			<div id="datosSesion">
				Usuario: &nbsp; &nbsp;&nbsp;  <input type="text" name="usuario"/><br/>
				Contraseña: <input type="password" name="contra"/><br/>
				¿Nuevo?<a href="../Controllers/registro.php">Regístrate.</a><input type="submit" value="Ingresar"/>
			</div>
		</form>
		<div id="head">
			<ul class="navBar">
				<li id="link1" class="nBelement"><a href="../Controllers/anunciar.php" class="nbLink" onMouseOver="arriba(this)" onMouseOut="normal(this)">Anunciar artículo</a></li>
				<li id="link2" class="nBelement"><a href="../Controllers/verArticulos.php" class="nbLink" onMouseOver="arriba(this)" onMouseOut="normal(this)">Ver artículos</a></li>
			</ul>
		</div>
		<div id="contenido">