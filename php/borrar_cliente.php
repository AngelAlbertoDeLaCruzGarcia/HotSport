<?php

include('conexion.php');
$clave=$_GET['Id'];
$query="CALL spdelcliente($clave);";
 $res=$conexion->query($query);
if($res)
 {
	header("location:../admi/list_Cliente.php");
 }
else
{
echo "Error al eliminar";
}
 ?>
