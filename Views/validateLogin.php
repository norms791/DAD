<?php
$connection = mysql_connect("localhost","root","");
if (!$connection){
	die('Could not connect: ' . mysql_error());
}
$link = mysql_select_db("dad", $connection);
if (!$link){
	die('Could not connect to database: ' . mysql_error());
}
$query = "SELECT * FROM `usuario` WHERE `Email` = '".$_POST['usuario']."'";
$result = mysql_query($query);
if(mysql_num_rows($result)){
	session_start();
	$_SESSION['mail'] = $_POST['usuario'];
	header("Location: http://localhost/GitHub/DAD/Views/");
}else{
	echo "El usuario no existe";
}
?>