<?php
	/*
	 * Vista que despliega el resultado de la busqueda
	 * de articulos en la base de datos
	 */
	 
	// en caso de haber encontrado articulos
	if($vacio==false){
?>
		<h1>N�mero de Resultados:
<?php
	// variable que cuenta cuantos articulos se hallaron
	$num = count($muebles);
	echo $num;
?>
		</h1>
		<h3>De click en la imagen de su elecci�n para ir a la p�gina del art�culo</h3>

<?php
	echo "		<table border='1'>
				<tr>
					<th>Foto del Art�culo</th>
					<th>Descripci�n</th>
					<th>Ubicaci�n</th>
				</tr>";
	
		
	// FOR de Norma
	// ciclo para desplegar todos los articulos en caso de haber mas de uno
	foreach($muebles as $mueble){
		$idMueble = $mueble->getIdMueble();
		echo "			<tr>\n";
		echo "				<td><img src='".(isset($imagenes[$mueble->getIdMueble()])?$imagenes[$mueble->getIdMueble()]:'../Pictures/img_noDisponible.jpg')."' width='400' /></td>\n";
		echo "				<td>".$mueble->getDesAbreviada()."</td>\n";
		echo "				<td>".$mueble->getUbicacion()."</a></td>\n";
		echo "				<td><a href='../Controllers/muestraInformacion.php?mueble=".$idMueble."'>Reservar este articulo</td>\n";
		echo "			</tr>\n";
	}

	echo "		</table>\n";
	
	} else if($vacio==true){
		// en caso de no haber encontrado ningun articulo
		echo "		<h1>No hubo resultados en la b�squeda.</h1>";
	}
	mysql_close($conexion);
?>
	</div>
	</body>
</html>