<?
session_start();
if(isset($_SESSION['mail'])){
$connection = mysql_connect("localhost","root","");
if (!$connection){
	die('Could not connect: ' . mysql_error());
}
$link = mysql_select_db("bdproyecto", $connection);
if (!$link){
	die('Could not connect to database: ' . mysql_error());
}
$query = "INSERT INTO `muebles` (`desAbreviada`, `desDetallada`, `ubicacion`, `usuario`) VALUES ('".$_POST['descBreve']."', '".$_POST['descCompleta']."', '".$_POST['ubicacion']."', '".$_SESSION['mail']."')";
$result = mysql_query($query);
}else{
	echo "Solo usuarios registrados";
}
?>