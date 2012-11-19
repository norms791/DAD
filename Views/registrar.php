<?php
	/*
	 * Vista que despliega el mensaje si se llevo
	 * a cabo con exito el registro del nuevo
	 * usuario; solo se podra desplegar esta pagina
	 * si se validaron los datos en la pagina de
	 * registro.php
	 */
	
	/*if($registro==false || $registro==null){
		echo "<h1>Hubo un error</h1>
		</body>
		</html>";
	} else {*/
	echo "		<h1>Registro Exitoso!</h1>
		</body>
	</html>";
	//}

	mysql_close($conexion);
?>