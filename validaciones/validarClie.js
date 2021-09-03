
function validaciones() {
	nombre = document.getElementById("Nombre").value;
	apaterno = document.getElementById("Apaterno").value;
    amaterno = document.getElementById("Amaterno").value;
	tel = document.getElementById("Tel").value;
	estado = document.getElementById("Estado").value;
	email = document.getElementById("Email").value;
	ciudad = document.getElementById("Ciudad").value;
	colonia = document.getElementById("Colonia").value;
	calle = document.getElementById("Calle").value;
	usuario = document.getElementById("Usuario").value;
	pass = document.getElementById("Passw").value;



	Expresion = /\w+@\w+\.+[a-z]/;
	
	if (nombre === "" || apaterno === "" || amaterno === "" || tel === "" || estado === "" || email === "" || ciudad === "" || colonia === "" || calle === "" || usuario === "" || pass === "") 
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
	else if(ciudad.length>60)
	{
		alert("Maximo 60 caracteres en ciudad");
		return false;
	}
	else if(colonia.length>60)
	{
		alert("Maximo 60 caracteres en colonia");
		return false;
	}
	else if(calle.length>60)
	{
		alert("Maximo 60 caracteres en calle");
		return false;
	}
	else if(usuario.length>30)
	{
		alert("Maximo 30 caracteres en usuario");
		return false;
	}
	else if(pass.length>30)
	{
		alert("Maximo 30 caracteres para contraseña");
		return false;
	}
}


