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
	</head>
	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido" style="width:100%";>
		   <form action="../Controllers/reservar.php" method="get">
			<input type="hidden" name='mueble' value='<?=$mueble->getIdMueble()?>'/>
				<h1>Informacion</h1>
				<table border="1" style="width:80%";>
					<tr>
						<td colspan="3">Informacion del articulo</td>
					</tr>
					<tr>
						<td>Descripcion breve</td>
						<td><?=$mueble->getDesAbreviada()?></td>
						<th rowspan="4" style="width:40%";><div id="googleMap" style="width:350px;height:270px;"></div></th>
					</tr>
					<tr>
						<td style="width:25%";>Descripcion detallada</td>
						<td style="width:35%";><?=$mueble->getDesDetallada()?></td>
					</tr>
					<tr>
						<td>Ubicacion</td>
						<td><?=$mueble->getUbicacion()?></td>
					</tr>
					<tr>
						<td>Imagen</td>
						<td><img src='<?=$foto?>' /></td>
					</tr>
				</table>
				<div id="latlongdiv" style="display: none;"><?=$mueble->getLatitud()?></div>
				<center>
					<input type="submit" value="Reservar" class="boton"/>
				</center>
		   </form>
		</div>
	</body>
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
	</script>
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
</html>