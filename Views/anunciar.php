<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../CSS/style.css" type="text/css" media="screen"/>
<title>Anunciar</title>
<style>
#head{
	background: url(../../../Tec%20de%20Monterrey/12vo.%20Semestre/DAD/Pictures/b.jpg);
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
</head>

	<body>
		<?php include_once("../views/header.php");?>
		<div id="contenido">
			<form action="..Controllers/validarAnuncio.php" method="post" enctype="multipart/form-data">
				  <h1>Introduce los datos del artículo:</h1>
				  <label><em>Fotografía</em></label>
				  <input name="foto" type="file" /> <br/> <br/>
				  <label><em>Descripción Breve</em></label> 
				  <span id="sprytextfield1">
				  <input type="text" name="descBreve" id="descBreve" />
				  <span class="textfieldRequiredMsg">Introduce una descripción breve.</span></span>  <br/>
				  <label><em>Descripción Completa</em></label>
				  <span id="sprytextarea1">
				  <textarea name="descCompleta" id="descCompleta" cols="45" rows="5"></textarea>
				  <span class="textareaRequiredMsg">Introduce una descripción completa.</span></span>  <br/>
				  <fieldset>
				  <legend><strong>Ubicación</strong></legend>
				  <label><em>Dirección</em></label>
				  <span id="sprytextfield2">
				  <input type="text" name="ubicacion" id="ubicacion" />
				  <span class="textfieldRequiredMsg">Introduce ubicación.</span></span>
				  </fieldset>
				  <input type="submit" class="boton" name="anunciar" id="anunciar" value="Anunciar" />
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
