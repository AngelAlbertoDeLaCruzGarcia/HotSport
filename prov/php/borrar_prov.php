<?php
	include("../php/conexion.php");
	$id=$_GET['Id'];
	$query="DELETE FROM tblprovedor WHERE vchRFC='$id'";
	 $resultado=$conexion->query($query);

	 if(!$resultado)
	 {
		echo "Error al eliminar";
	 	
	 }
	else
	{
echo "se elimino";
echo $id;
	//header("location:../php/list_Prov.php");
}
 ?>
