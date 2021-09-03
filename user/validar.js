
function validaciones() {
    nombrep = document.getElementById("NombreP").value;
    marca = document.getElementById("Marca").value;
	cantidad = document.getElementById("Cantidad").value;
	precio = document.getElementById("Precio").value;
    existencia = document.getElementById("Existencia").value;

	if (nombrep === "" || marca === "" || cantidad === "" || precio === "" || existencia === "") 
	{
		alert("Todos los campos se deben de rellenar");
		return false;
	}
	else if(nombrep.length>80)
	{
		alert("Maximo 60 caracteres validos en nombre del producto");
		return false;
	}
	else if(marca.length>60)
	{
		alert("Maximo 60 caracteres en la marca");
		return false;
	}
	else if(cantidad.length>20)
	{
		alert("Maximo 20 caracteres en la cantiadad");
		return false;
	}
	else if(isNaN(cantidad))
	{
		alert("Se requiere una cantidad en numero");
		return false;
	}
	else if(precio.length>20)
	{
		alert("Maximo 20 caracteres validos para el precio");
		return false;
	}
	else if(isNaN(precio))
	{
		alert("Se requiere un precio en numero");
		return false;
	}
	else if(existencia.length>20)
	{
		alert("Maximo 20 caracteres validos para la existencia del producto");
		return false;
	}
	else if(isNaN(existencia))
	{
		alert("Se requiere una existencia en numero");
		return false;
	}


}


