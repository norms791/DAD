<?php
	/* Versión Gaby
	 * Controlador que recibe los datos introducidos por el usuario
	 * para anunciar un mueble
	 */
	// Verificación del usuario dentro de la sesión
	session_start();
	if(isset($_SESSION['mail'])){
		include_once("../Models/Usuario.php");
		$usuario= Usuario::obtenerUsuario($_SESSION['mail']);
		// Crea el nuevo mueble dentro de la base de datos
		if (count($_POST)!=0){
			include_once("../Models/Muebles.php");
			$mueble=new Muebles();
			$mueble->llenaDatos($_POST['descBreve'], $_POST['descCompleta'], $_POST['ubicacion'], $_POST['latlong'], 0, $usuario->getEmail());
			$mueble->insertarMueble();
			if(!empty($_FILES)){
				$filename=explode(".", $_FILES['foto']['name']);
				move_uploaded_file($_FILES['foto']['tmp_name'], "../PicturesData/".$mueble->getIdMueble().".".$filename[count($filename)-1]);
			}
			// Si se creo el mueble correctamente despliega la vista de confirmación de anuncio
			include("../Views/confirmarAnuncio.php");
		} else {
			include("../Views/anunciar.php");
		}
	}	
	else{
		$err=2;
		$mensajeError = "Anunciar Artículos";
		include("../Views/error.php");
	}
?>
