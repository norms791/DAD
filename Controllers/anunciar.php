<?
$connection = mysql_connect("localhost","root","");
if (!$connection){
	die('Could not connect: ' . mysql_error());
}
$link = mysql_select_db("bdproyecto", $connection);
if (!$link){
	die('Could not connect to database: ' . mysql_error());
}
$query = "SELECT * FROM `usuario` WHERE `Email` = '".$_SESSION['mail']."'";
$result = mysql_query($query);
$usario = $result[0];
$query = "INSERT INTO `muebles` (`idUsuario`, `desBreve`, `desCompleta`) VALUES ('".$usuario['idUsuario']."', '".$_POST['descBreve']."', '".$_POST['descCompleta']."')";
$result = mysql_query($query);
?>
<script>
window.location("index.html");
</script>


