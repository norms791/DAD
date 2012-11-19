<?php
	/*
	 * Vista que despliega el resultado de la busqueda
	 * de articulos en la base de datos
	 */
	 
	// en caso de haber encontrado articulos
	if($vacio==false){
?>
		<h1>Número de Resultados:
<?php
	// variable que cuenta cuantos articulos se hallaron
	$num = count($muebles);
	echo $num;
?>
		</h1>
		<h3>De click en la imagen de su elección para ir a la página del artículo</h3>

<?php
	echo "		<table border='1'>
				<tr>
					<th>Foto del Artículo</th>
					<th>Descripción</th>
					<th>Ubicación</th>
				</tr>";
	
	// FOR de Diego
	/*for($i=0;$i<1;$i++){
		echo "			<tr>\n";
		echo "				<td><img src='".$foto[$i]."' width='400' /></td>\n";
		echo "				<td>".$muebles[$i]->getDesAbreviada()."</td>\n";
		echo "				<td>".$muebles[$i]->getUbicacion()."</td>\n";
		echo "			</tr>\n";
	}*/
	
	// FOR de Norma
	// ciclo para desplegar todos los articulos en caso de haber mas de uno
	foreach($muebles as $mueble){
		echo "			<tr>\n";
		echo "				<td><a href='../Views/'><img src='".(isset(glob("../PicturesData/".$mueble->getIdMueble().".*")[0])?glob("../PicturesData/".$mueble->getIdMueble().".*")[0]:'')."' width='400' /></a></td>\n";
		echo "				<td>".$mueble->getDesAbreviada()."</td>\n";
		echo "				<td>".$mueble->getUbicacion()."</td>\n";
		echo "			</tr>\n";
	}

	echo "		</table>\n";
	
	} else if($vacio==true){
		// en caso de no haber encontrado ningun articulo
		echo "		<h1>No hubo resultados en la busqueda.</h1>";
	}
	mysql_close($conexion);
?>
	</body>
</html>