
function validaciones() {
	rfc = document.getElementById("RFC").value;
	empresa = document.getElementById("Empresa").value;
    nombre = document.getElementById("Nombre").value;
	apaterno = document.getElementById("Apaterno").value;
	amaterno = document.getElementById("Amaterno").value;
	tel = document.getElementById("Tel").value;
	email = document.getElementById("Email").value;

	Expresion = /\w+@\w+\.+[a-z]/;
	
	if (rfc === "" || empresa === "" || nombre === "" || apaterno === "" || amaterno === "" || tel === "" || email === "") 
	{
		alert("Todos los campos se deben de rellenar");
		return false;
	}
	else if(nombre.length>60)
	{
		alert("Maximo 60 caracteres validos en nombre");
		return false;
	}
	else if(apaterno.length>60)
	{
		alert("Maximo 60 caracteres en apellido materno");
		return false;
	}
	else if(amaterno.length>60)
	{
		alert("Maximo 60 caracteres en apellido materno");
		return false;
	}

	else if(tel.length>10)
	{
		alert("Maximo 10 caracteres en telefono");
		return false;
	}
	else if(isNaN(tel))
	{
		alert("Se requiere un numero de telefono valido");
		return false;
	}
	else if(!Expresion.test(email))
	{
		alert("Correo invalido, favor de revisarlo");
		return false;
	}
}


