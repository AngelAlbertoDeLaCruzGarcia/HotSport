<?php
	include("../php/conexion.php");
	$id=$_GET['del'];
	$query="CALL spdelprov($id)";
	$resultado=$conexion->query($query);

	 if(!$resultado)
	 {
		echo "Error al eliminar";
	 	
	 }
	else
	{
echo "se elimino";
header("location:../admi/list_Prov.php");
}
 ?>
