<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<!--Vista en donde se despliegan los datos para anunciar un nuevo mueble -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen"/>
<title>Anunciar</title>
<style>
#head{
	background: url(../Pictures/b.jpg);
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<!-- Implementación del mapa de GoogleMaps-->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script>
<!--Coordenadas del Tecnologico de Monterrey para que aparezca como primera vista del mapa-->
	var myCenter=new google.maps.LatLng(25.649573,-100.291125);
	function initialize(){
		var mapProp = {
		center:myCenter,
		zoom:15,
		mapTypeId:google.maps.MapTypeId.ROADMAP
		};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
		});
	function placeMarker(location){
		var marker = new google.maps.Marker({
		position: location,
		map: map,
		});
		document.getElementsByName('latlong')[0].value = location;
	}
	}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

	<body>
    <!-- Campos donde se insertaran los datos de los muebles -->
		<?php include_once("../views/header.php");?>
		<div id="contenido">
			<form action="../Controllers/anunciar.php" method="post" enctype="multipart/form-data">
				  <h1>Introduce los datos del artículo:</h1>
				  <label><em>Fotografía</em></label>
				  <input name="foto" type="file" /> <br/> <br/>
				  <label><em>Descripción Breve</em></label> <br/>
				  <span id="sprytextfield1">
				  <input type="text" name="descBreve" id="descBreve" />
				  <span class="textfieldRequiredMsg">Introduce una descripción breve.</span></span>  <br/>
				  <label><em>Descripción Completa</em></label><br/>
				  <span id="sprytextarea1">
				  <textarea name="descCompleta" id="descCompleta" cols="45" rows="5"></textarea>
				  <span class="textareaRequiredMsg">Introduce una descripción completa.</span></span>  <br/>
				  <fieldset>
				  <legend><strong>Ubicación</strong></legend>
				  <label><em>Dirección</em></label>
				  <span id="sprytextfield2">
				  <input type="text" name="ubicacion" id="ubicacion" /><br/>
				  <span class="textfieldRequiredMsg">Coloca tu ubicacion en el mapa.</span></span>
				  <div id="googleMap" style="width:380px;height:350px;"></div>
				  <input type="hidden" name="latlong" value="">
				  </fieldset>
				  <input type="submit" value="Anunciar" class="boton" id="anunciar"/>
				  <br/>
			</form>
		</div>	
		<script type="text/javascript">
			var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
			var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
			var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
		</script>
	</body>
</html>
