<?php
include('conexion.php');
$fecha=$_POST['fecha'];
$id=$_POST['id'];
$cant=$_POST['cantidad'];
$precio=$_POST['precio'];
$prod=$_POST['producto'];
$client=$_POST['cliente'];
$hora=$_POST['hora'];
$pago=$_POST['pago'];


$sql=mysqli_query($conexion,"CALL spupdvent('$fecha',$precio,$cant,$prod,$client,$pago,$id);");


if(!$sql){
    echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
 
}else {
    header("Location:../admi/list_Ventas.php");
}


?>