<?php
	if($vacio==false){
?>
		<h1>Número de Resultados:
<?php
	$num = count($muebles);
	echo $num;
?>
		</h1>
		<!--//PENDIENTE - convertir imagenes en hotlinks-->
		<h3>De click en la imagen de su elección para ir a la página del artículo</h3>

<?php
	echo "		<table border='1'>
				<tr>
					<th>Foto del Artículo</th>
					<th>Descripción</th>
					<th>Ubicación</th>
				</tr>";
	
	if($num!=0){
		for($i=0;$i<1;$i++){
			echo "			<tr>\n";
			echo "				<td><img src='".$foto[$i]."' width='400' /></td>\n";
			echo "				<td>".$muebles[$i]->getDesAbreviada()."</td>\n";
			echo "				<td>".$muebles[$i]->getUbicacion()."</td>\n";
			echo "			</tr>\n";
		}
	} else {
		echo "			<tr>\n";
		echo "				<td><img src='".$nofoto."' width='400' /></td>\n";
		echo "				<td>".$noexiste[0]->getDesAbreviada()."</td>\n";
		echo "				<td>".$noexiste[0]->getUbicacion()."</td>\n";
		echo "			</tr>\n";
	}

	echo "		</table>\n";
	
	} else if($vacio==true){
		echo "		<h1>No se recibió información para poder buscar artículos.</h1>";
	}
	mysql_close($conexion);
?>
	</body>
</html>