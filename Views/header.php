<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<head>
		<title>Reciclando muebles</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="../JavaScripts/menu.js"></script>
	</head>
	<body>
	<a href="../Controllers/index.php"><img id="logo" src="../Pictures/logo.png" alt="Reciclando Muebles A.C."/></a>
	<div id="datosSesion" style="">
		<center><?php
			$dato= $usuario->getNombre();
			
			echo $dato;
		?></center>
		<A HREF ="../Controllers/logout.php">Salir</A>
	</div>
	<div id="busqueda">
		<form action="../Controllers/buscarArt.php" method="get">
		<input type="text" name="parametro" id="parametroBusqueda" class="campoSesion"/>
		<input type="submit" class="boton" value="Buscar"/>
		</form>
	</div>
	<div id="head">
	<ul class="navBar">
	<li id="link1" class="nBelement"><a href="../Controllers/anunciar.php" class="nbLink" onMouseOver="arriba(this)" onMouseOut="normal(this)">Anunciar artículo</a></li>
	<li id="link2" class="nBelement"><a href="../Controllers/verArticulos.php" class="nbLink" onMouseOver="arriba(this)" onMouseOut="normal(this)">Ver artículos</a></li>
	</ul>
	</div>
	<div id="contenido">
	