<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
	<head>
		<title>Reservación</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../Ajax/modificacion.js"></script>		
		<script>
			function validaReservacion(){
				confirm("¿De verdad deseas reservar este artículo?");
			}
			
		</script>
	</head>
	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido">
		   <form action="../Controllers/confirmarReservacion.php" method="get">
		   	<input type="hidden" name='mueble' value='<?=$mueble->getIdMueble()?>'/>
		    <h1>Reservación</h1>			
			<p style="margin-right: 106px;">Por favor verifica tus datos, en caso de que tu nombre, apellido o teléfono sean incorrectos puedes modificarlos haciendo doble click sobre el dato. Después de editarlos presiona Enter para guardar los cambios.</p>
			<div id="infoReservacion">
				<h2>Datos del cliente:</h2>
				<div class="datosC"><b>E-mail: </b><div style="margin-left: 3px;"><?=$usuario->getEmail()?></div></div>
				<div class="datosC"><b>Nombre: </b><div id="nombre" style="float:left;margin-left: 3px;" ondblclick="modificar(this)"><?=$usuario->getNombre()?></div></div>
				<div class="datosC"><b>Apellido: </b><div id="apellido" style="float:left;margin-left: 3px;" ondblclick="modificar(this)"><?=$usuario->getApellido()?></div></div>					
				<div class="datosC"><b>Teléfono: </b><div id="telefono" style="float:left;margin-left: 3px;" ondblclick="modificar(this)"><?=$usuario->getTelefono()?></div></div>	
			</div>
			<div id="infoArticulo" >
				<h2>Artículo reservado:</h2>
				<div style="float: left; height: 312px; width: 312px; display: table-cell; vertical-align: middle; text-align: center;">
					<img src='<?=$foto?>' style="max-width: 100%; max-height: 100%;"/>
				</div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Descripción abreviada: </b></div><div class="datosA-cont"><?=$mueble->getDesAbreviada()?></div></div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Descripción detallada&nbsp;: </b></div><div class="datosA-cont"><?=$mueble->getDesDetallada()?></div></div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Ubicación del artículo&nbsp;: </b></div><div class="datosA-cont"><?=$mueble->getUbicacion()?></div></div>
				<div id="latlongdiv" style="display:none"><?= preg_replace('/\(|\)/','',$mueble->getLatitud()) ?></div>
				<div id="googleMap" style="width:350px;height:270px;"></div>
			</div>
			<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
			<script>
				var latlong = document.getElementById("latlongdiv").innerHTML;
				var result = latlong.split(",");
				var myCenter = new google.maps.LatLng(result[0],result[1]);
				var infoProduct=document.getElementById("descAbreviada");
				var marker;
				function initialize(){
					var mapProp = {
					center:myCenter,
					zoom:15,
					mapTypeId:google.maps.MapTypeId.ROADMAP
					};
					var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
					marker=new google.maps.Marker({
					position:myCenter,
					animation:google.maps.Animation.BOUNCE
					});
					marker.setMap(map);
					//Si se le da clic al icono agrega su info
					var infowindowtype2 = new google.maps.InfoWindow({
					content:infoProduct
					});
					google.maps.event.addListener(marker, 'click', function() {
					infowindowtype2.open(map,marker);
					});
				}
				google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			<center>
				<input type="submit" value="Reservar" class="boton" onclick="validaReservacion()"/>
			</center>
		   </form>
		</div>
		
    	
	</body>
</html>