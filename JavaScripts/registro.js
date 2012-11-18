window.onload = initForm;

function initForm(){
   document.forms[0].onsubmit = function(){return validForm();}
}

function verificaMail(mail){
	var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function(){
		if(xhr.readyState==4 && xhr.status==200){
			var result = xhr.responseText;
			document.getElementById("maildiv").innerHTML = result;
			//document.getElementById("maildiv").innerHTML = "que onda";
		} else if(xhr.status==404){
			var aviso ="Se detecto un problema con el servidor";
			document.getElementById("maildiv").innerHTML = aviso;
		}
	}
	xhr.open("GET", "/ProyectoDAI/Ajax/mailAJAX.php?mail=" + mail, true);
	xhr.send();
}

function validForm(){
	var allGood = true;
	var inputs = document.getElementsByTagName("input");
	var spans = document.getElementsByTagName("span");
	var mail = document.Registro.emailReg.value;
	var atpos = mail.indexOf("@");
	var dotpos = mail.lastIndexOf(".");
	var letras =  /^[a-zA-Z]+$/;
	var numero = /^[0-9]+$/;
	var itesm = new RegExp("@itesm.mx");
	
	for(var i=0; i<inputs.length; i++){
		var iden = inputs[i].id;
		if(inputs[i].value==""){
			allGood = false;
			inputs[i].className = "wrong";
		} else if(((iden=="nombreReg")||(iden=="apellReg"))&& !(inputs[i].value.match(letras))){
			allGood = false;
			inputs[i].className = "letras";
		} else if((iden=="telReg")&& !(inputs[i].value.match(numero))){
			allGood = false;
			inputs[i].className = "numero";
		} else if((iden=="emailReg")&&((atpos<1)||(dotpos<atpos+2)||(dotpos+2>=mail.length))){
			allGood = false;
			inputs[i].className = "mail";
		} else if((iden=="emailReg")&&((itesm.exec(inputs[i].value)==null))){
			allGood = false;
			inputs[i].className = "itesm";
		} else if((iden=="cpwdReg")&&(inputs[i].value!=inputs[i-1].value)){
			allGood = false;
			inputs[i].className = "pwd";
			inputs[i-1].className = "pwd";
		} else {
			inputs[i].className = "";
		}
	}
	
	for(var j=0; j<spans.length; j++){
		var clase = inputs[j].className;
		if(clase=="wrong"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Por favor, llene este campo.";
		} else if(clase=="letras"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo letras.";
		} else if(clase=="numero"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo numeros.";
		} else if(clase=="mail"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Email no valido.";
		} else if(clase=="itesm"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Solo email del ITESM.";
		} else if(clase=="pwd"){
			spans[j].className = "wrong";
			spans[j].innerHTML = "Las contraseñas no concuerdan.";
		} else {
			spans[j].className = "";
			spans[j].innerHTML = "";
		}
	}
	
	if(document.getElementById("maildiv").innerHTML!=""){
		allGood = false;
	}
	
	//spans[0].innerHTML = allGood;
	return allGood;
}