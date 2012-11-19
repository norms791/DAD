/*
 * Javascript que se encarga de validar los campos
 * de la pagina de registro.php
 */
 
// se llama la funcion initForm al cargarse la pagina
window.onload = initForm;

/* cuando se da click en el boton de submit se llama a
 * la funcion validForm que regresara TRUE o FALSE
 * dependiendo de si se cumplieron los requisitos de
 * validacion; si regresa FALSE no podra enviar los
 * datos a la pagina de registrar.php
 */
function initForm(){
   document.forms[0].onsubmit = function(){return validForm();}
}

/*
 * al escribir el email en su campo respectivo y desenfocar ese
 * campo, se ejecutara el AJAX para verificar si el email
 * proporcionado ya existe o no; si ya existe, desplegara un
 * mensaje al respecto
 */
function verificaMail(mail){
	var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState==4 && xhr.status==200){
			var result = xhr.responseText;
			document.getElementById("maildiv").innerHTML = result;
		} else if(xhr.status==404){
			var aviso ="Se detecto un problema con el servidor";
			document.getElementById("maildiv").innerHTML = aviso;
		}
	}
	xhr.open("GET", "/ProyectoDAI/Ajax/mailAJAX.php?mail=" + mail, true);
	xhr.send();
}

// funcion para validar la forma
function validForm(){
	// valor que se usara para el "return"
	var allGood = true;
	
	// toma los elementos input y span
	var inputs = document.getElementsByTagName("input");
	var spans = document.getElementsByTagName("span");
	
	// toma el valor del elemento "emailReg"
	var mail = document.Registro.emailReg.value;
	
	// valores para la validacion del email
	var atpos = mail.indexOf("@");
	var dotpos = mail.lastIndexOf(".");
	
	// expresiones regulares
	var letras =  /^[a-zA-Z]+$/;
	var numero = /^[0-9]+$/;
	var itesm = new RegExp("@itesm.mx");
	
	/* cambia el valor de retorno a FALSE y la clase de los inputs
	 * respectivos si no cumple con la validacion de los campos
	 */
	for(var i=0; i<inputs.length; i++){
		var iden = inputs[i].id;
		if(inputs[i].value==""){
			// en caso de que los campos esten vacios
			allGood = false;
			inputs[i].className = "wrong";
		} else if(((iden=="nombreReg")||(iden=="apellReg"))&& !(inputs[i].value.match(letras))){
			// en caso de que no se usen solo letras para el Nombre y Apellido
			allGood = false;
			inputs[i].className = "letras";
		} else if((iden=="telReg")&& !(inputs[i].value.match(numero))){
			// en case de que no se usen solo numero para el Telefono
			allGood = false;
			inputs[i].className = "numero";
		} else if((iden=="emailReg")&&((atpos<1)||(dotpos<atpos+2)||(dotpos+2>=mail.length))){
			// en caso de que el email no sea valido
			allGood = false;
			inputs[i].className = "mail";
		} else if((iden=="emailReg")&&((itesm.exec(inputs[i].value)==null))){
			// en caso de que el email no sea del ITESM
			allGood = false;
			inputs[i].className = "itesm";
		} else if((iden=="cpwdReg")&&(inputs[i].value!=inputs[i-1].value)){
			// en caso de que las contraseñas no concuerden
			allGood = false;
			inputs[i].className = "pwd";
			inputs[i-1].className = "pwd";
		} else {
			inputs[i].className = "";
		}
	}
	
	/*
	 * despliega el mensaje correspondiente si los campos
	 * correspondientes no fueron validados
	 */
	for(var j=0; j<spans.length; j++){
		var clase = inputs[j].className;
		if(clase=="wrong"){
			// en caso de que los campos esten vacios
			spans[j].className = "wrong";
			spans[j].innerHTML = "Por favor, llene este campo.";
		} else if(clase=="letras"){
			// en caso de que no se usen solo letras para el Nombre y Apellido
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo letras.";
		} else if(clase=="numero"){
			// en case de que no se usen solo numero para el Telefono
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo numeros.";
		} else if(clase=="mail"){
			// en caso de que el email no sea valido
			spans[j].className = "wrong";
			spans[j].innerHTML = "Email no valido.";
		} else if(clase=="itesm"){
			// en caso de que el email no sea del ITESM
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo email del ITESM.";
		} else if(clase=="pwd"){
			// en caso de que las contraseñas no concuerden
			spans[j].className = "wrong";
			spans[j].innerHTML = "Las contraseñas no concuerdan.";
		} else {
			spans[j].className = "";
			spans[j].innerHTML = "";
		}
	}
	
	/* si el elemento "maildiv" contiene el mensaje proporcionado
	 * por la funcion verficaMail, el email ya existe en la base de
	 * datos y por lo tanto el retorno sera FALSE
	 */
	if(document.getElementById("maildiv").innerHTML!=""){
		allGood = false;
	}
	
	//spans[0].innerHTML = allGood;
	return allGood;
}