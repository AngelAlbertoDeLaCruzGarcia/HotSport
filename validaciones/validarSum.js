
function validaciones() {
	fecha = document.getElementById("Fecha").value;
	hora = document.getElementById("Hora").value;
    cantidad = document.getElementById("Cantidad").value;
	precio = document.getElementById("Precio").value;
	producto = document.getElementById("Producto").value;
	proveedor = document.getElementById("Prov").value;

	if (fecha === "" || hora === "" || cantidad === "" || precio === "" || producto === "" || proveedor === "") 
	{
		alert("Todos los campos se deben de rellenar");
		return false;
	}
	else if(cantidad.length>10)
	{
		alert("Maximo 10 caracteres en cantidad");
		return false;
	}
	else if(isNaN(cantidad))
	{
		alert("Se requiere una cantidad en numero");
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
	else if(producto.length>20)
	{
		alert("Maximo 20 caracteres validos para el producto");
		return false;
	}
	else if(proveedor.length>20)
	{
		alert("Maximo 20 caracteres validos para el proveedor");
		return false;
	}
}


