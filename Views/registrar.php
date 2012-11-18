<?php
	if($registro==false || $registro==null){
		echo "<h1>Hubo un error</h1>
		</body>
		</html>";
	} else {
		echo "<h1>Registro Exitoso!</h1>
		</body>
		</html>";
	}

	mysql_close($conexion);
?>