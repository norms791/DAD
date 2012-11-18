<h3>Por favor, ingrese los datos que se le piden a continuacion.</h3>
<form name="Registro" action="../Controllers/registrar.php" method="post">
Nombre: &nbsp;
<input type="text" id="nombreReg" name="nombreReg" size="50" autofocus="autofocus" />
<span id="nomsp"></span><br /><br />
Apellido: &nbsp;<input type="text" id="apellReg" name="apellReg" size="50" />
<span id="apellsp"></span><br /><br />
Telefono: <input type="text" id="telReg" name="telReg" size="50" maxlength="12" />
<span id="telsp"></span><br /><br />
Email: &nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" id="emailReg" name="emailReg" size="50" onblur="verificaMail(this.value)" />
<span id="mailsp"></span><p id="maildiv"></p>

Contraseña: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="password" id="pwReg" name="pwReg" size="15" maxlength="12" />
<span id="pwdsp"></span><br /><br />
Confirme Contraseña: 
<input type="password" id="cpwdReg" size="15" maxlength="12" />
<span id="cpwdsp"></span><br /><br />
<input type="submit" value="Registrar Usuario" />
</form>
</body>
</html>