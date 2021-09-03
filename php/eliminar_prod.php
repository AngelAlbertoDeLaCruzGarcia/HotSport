<?php
include('conexion.php');
$nombrep=$_GET['Id'];
$sql="CALL spdelprod($nombrep);";
$res=$conexion->query($sql);
if($res)
 {
 	header("location:../admi/list_Productos.php");
 }
else
{
echo "Error al eliminar";
}
?>