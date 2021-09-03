<?php
include('conexion.php');
$clave=$_GET['Id'];
$query="CALL spdeluser($clave);";
 $res=$conexion->query($query);
if($res)
 {
	header("location:../admi/list_User.php");
 }
else
{
echo "Error al eliminar";
}
 ?>
