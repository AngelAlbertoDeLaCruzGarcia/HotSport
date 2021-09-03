<?php
include('conexion.php');
$id=$_POST['id'];
$nombrep=$_POST['nombrep'];
$descripcion=$_POST['Descripcion'];
$categoria=$_POST['cat'];
$marca=$_POST['marca'];
$precio=$_POST['precio'];
$talla=$_POST['talla'];
$cantidad=$_POST['cantidad'];


$sql=mysqli_query($conexion,"CALL spupdprod
($id,'$nombrep','$descripcion','$categoria','$marca', '$talla',$cantidad,$precio);");


if(!$sql){
    echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
 
}else {
    header("Location:../admi/list_Productos.php");
}


?>