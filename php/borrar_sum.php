<?php
	include("../php/conexion.php");
	$id=$_GET['Id'];
	$query="DELETE FROM tblsuministrados_por WHERE intIdSub='$id'";
	 $resultado=$conexion->query($query);

	 if(!$resultado)
	 {
		echo "Error al eliminar";
	 	
	 }
	else
	{
echo "Se elimino";
	header("location:../admi/list_Sum.php");
}
 ?>
