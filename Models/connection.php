<?php

	global $conexion;
	
	if (!($conexion=mysql_connect("localhost","root","")))
	{
		echo "Error conectando a la base de datos.";
		exit();
	}
	else echo ("si se pudo conectar");
	if (!(mysql_select_db("dad",$conexion)))
	{
		echo "Error seleccionando la base de datos.";
		exit();
	} else echo("si  se conecto a la BD");
?>