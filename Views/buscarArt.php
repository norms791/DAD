<h1>Numero de Resultados:
<?php
$num = count($muebles);
echo $num;
?>
</h1>
<!--//PENDIENTE - convertir imagenes en hotlinks-->
<h3>De click en la imagen de su eleccion para ir a la pagina del articulo</h3>

<?php
echo "<table border='1'>
<tr>
<th>Foto del Articulo</th>
<th>Descripcion</th>
<th>Ubicacion</th>
</tr>";

foreach($muebles as $mueble){
   echo "<tr>";
   echo "<td><img src='".(isset(glob("../PicturesData/".$mueble->getIdMueble().".*")[0])?glob("../PicturesData/".$mueble->getIdMueble().".*")[0]:'')."' width='400' /></td>";
   echo "<td>".$mueble->getDesAbreviada()."</td>";
   echo "<td>".$mueble->getUbicacion()."</td>";
   echo "</tr>";
}

// en caso de que la busqueda no encuentre resultados
/*if($resultado==0){
   $existe = mysql_query("select * from muebles where idMueble = 0");
   $noexiste = mysql_fetch_array($existe);
   echo "<tr>";
   echo "<td><img src='" . $noexiste['foto'] . "' /></td>";
   echo "<td>" . $noexiste['desAbreviada'] ."</td>";
   echo "<td>" . $noexiste['ubicacion'] . "</td>";
   echo "</tr>";
}*/

echo "</table>";

mysql_close($conexion);
?>
</body>
</html>