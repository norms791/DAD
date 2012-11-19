<?php
//crear y destruir session  
session_start();  
// vaciarla  
$_SESSION = array();  
// destruirla  
session_destroy();  
////////////////////////  \
include("../Controllers/index.php");
?>