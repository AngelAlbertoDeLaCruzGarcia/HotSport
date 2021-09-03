<?php
  require('conexion.php');
  $fecha=$_POST['fecha'];
  $cant=$_POST['cantidad'];
  $precio=$_POST['precio'];
  $prod=$_POST['producto'];
  $prov=$_POST['prov'];
  
  $update=mysqli_query($conexion,"UPDATE tblsuministrados_por
  SET 
    vchRFC = '$prov',
    intCantidad = $cant,
    intIdproducto = '$prod',
    fltPrecio = $precio 
  WHERE dtFecha= '$fecha';");

  if(!$update){
      echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
   
  }else {
      header("Location:../admi/list_Sum.php");
  }
?>