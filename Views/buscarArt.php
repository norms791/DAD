<html>
<head>
<title>Busqueda de Articulos</title>
</head>

<body>
<?php
// Codigo de prueba
$sql = mysql_connect("localhost", "root", "");
if(!$sql){
   die('Could not connect: '.mysql_error());
}
mysql_select_db("bdproyecto", $sql);

/* toma el valor de la barra de busqueda de la pagina de inicio */
//$keyword = $_GET["keyword"];
$keyword = "ebano";

$query = mysql_query("select * from muebles where desAbreviada like '%".$keyword."%'");
$resultado = 0;

while($row = mysql_fetch_array($query)){
   $resultado++;
}
?>

<h1>Numero de Resultados:
<?php
echo $resultado;
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

$quary = mysql_query("select * from muebles where desAbreviada like '%".$keyword."%'");
//echo "B".$quary."B";

while($rowa = mysql_fetch_array($quary)){
   echo "<tr>";
   echo "<td><img src='" . $rowa['foto'] . "' width='400' /></td>";
   echo "<td>" . $rowa['desAbreviada'] ."</td>";
   echo "<td>" . $rowa['ubicacion'] . "</td>";
   echo "</tr>";
}

// en caso de que la busqueda no encuentre resultados
if($resultado==0){
   $existe = mysql_query("select * from muebles where idMueble = 0");
   $noexiste = mysql_fetch_array($existe);
   echo "<tr>";
   echo "<td><img src='" . $noexiste['foto'] . "' /></td>";
   echo "<td>" . $noexiste['desAbreviada'] ."</td>";
   echo "<td>" . $noexiste['ubicacion'] . "</td>";
   echo "</tr>";
}

echo "</table>";

mysql_close($sql);
?>
</body>
</html>