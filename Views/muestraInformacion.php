<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<title>Reciclado Muebles</title>
		<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen" />	
		<style>
			#head{
				background: url(../Pictures/b.jpg);
			}
		</style>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
	</head>
	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido" style="width:100%";>
		   <form action="../Controllers/reservar.php" method="get">
			<input type="hidden" name='mueble' value='<?=$mueble->getIdMueble()?>'/>
				<h1>Informacion</h1>
				<div id="infoArticulo" >
				<div style="float: left; height: 312px; width: 312px; display: table-cell; vertical-align: middle; text-align: center;">
					<img src='<?=$foto?>' style="max-width: 50%; max-height: 50%;"/>
				</div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Descripci�n abreviada: </b></div><div class="datosA-cont"><?=$mueble->getDesAbreviada()?></div></div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Descripci�n detallada&nbsp;: </b></div><div class="datosA-cont"><?=$mueble->getDesDetallada()?></div></div>
				<div style="margin-bottom: 13px;"><div class="datosA"><b>Ubicaci�n del art�culo&nbsp;: </b></div><div class="datosA-cont"><?=$mueble->getUbicacion()?></div></div>
				<div id="latitudinfo" style="display:none"><?= preg_replace('/\(|\)/','',$mueble->getLatitud()) ?></div>
				<div id="googleMap" style="width:350px;height:270px;"></div>
				</div>
				<center>
					<input type="submit" value="Reservar" class="boton"/>
				</center>
		   </form>
		</div>
	</body>
	<script>
			var mytext = document.getElementById("latitudinfo").innerHTML;
			var result = mytext.split(",");
			var myCenter=new google.maps.LatLng(result[0],result[1]);
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
			}
		google.maps.event.addDomListener(window, 'load', initialize);
		</script>
</html>