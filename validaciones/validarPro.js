
function validaciones() {
	nombrep = document.getElementById("NombreP").value;
	descripcion = document.getElementById("descripcion").value;
    marca = document.getElementById("Marca").value;
	precio = document.getElementById("Precio").value;
	talla = document.getElementById("Talla").value;
	cantidad = document.getElementById("Cantidad").value;
	

	if (nombrep === "" || descripcion === "" || marca === "" || precio === "" || talla === "" || cantidad === "") 
	{
		alert("Todos los campos se deben de rellenar");
		return false;
	}
	else if(nombrep.length>60)
	{
		alert("Maximo 60 caracteres validos en nombre del producto");
		return false;
	}
	else if(descripcion.length>100)
	{
		alert("Maximo 100 caracteres validos en la descripcion del producto");
		return false;
	}
	else if(marca.length>60)
	{
		alert("Maximo 60 caracteres en la marca");
		return false;
	}
	else if(precio.length>20)
	{
		alert("Maximo 20 caracteres en la precio");
		return false;
	}
	else if(isNaN(precio))
	{
		alert("Se requiere precio en numero");
		return false;
	}
	else if(cantidad.length>20)
	{
		alert("Maximo 20 caracteres en cantidad");
		return false;
	}
	else if(isNaN(cantidad))
	{
		alert("Se requiere una cantidad en numero");
		return false;
	}
}


