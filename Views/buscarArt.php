<?php
	if($vacio==false){
?>
		<h1>N�mero de Resultados:
<?php
	$num = count($muebles);
	echo $num;
?>
		</h1>
		<!--//PENDIENTE - convertir imagenes en hotlinks-->
		<h3>De click en la imagen de su elecci�n para ir a la p�gina del art�culo</h3>

<?php
	echo "		<table border='1'>
				<tr>
					<th>Foto del Art�culo</th>
					<th>Descripci�n</th>
					<th>Ubicaci�n</th>
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
		echo "		<h1>No se recibi� informaci�n para poder buscar art�culos.</h1>";
	}
	mysql_close($conexion);
?>
	</body>
</html>