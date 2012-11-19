<?php
/*
 * PHP exclusivo para el comportamiento AJAX
 * que verifica si ya existe un usuario
 * con el email proporcionado por el usuario
 * en la pagina de registro.php
 */
 
$sql = mysql_connect("localhost", "root", "");
if(!$sql){
   die('Could not connect: '.mysql_error());
}
mysql_select_db("dad", $sql);

$mail = $_GET["mail"];
$query = mysql_query("select * from usuario where Email='$mail'");

while($row=mysql_fetch_array($query)){
	echo "Ya existe un usuario con este email.";
}

mysql_close($sql);
?>