<?php
  require('conexion.php');
  $clave=$_POST['clave'];
  $nombre=$_POST['nombre'];
  $Apaterno=$_POST['Ap'];
  $Amaterno=$_POST['Am'];
  $cel=$_POST['Cel'];
  $empre=$_POST['emp'];
  $email=$_POST['email'];
  
  $update=mysqli_query($conexion,"UPDATE tblprovedor
  SET vchNombre = '$nombre',
    vchApaterno = '$Apaterno',
    vchAmaterno = '$Amaterno',
    vchCelular = '$cel',
    vchEmpresa = '$empre',
    vchEmail = '$email' 
  WHERE vchRFC= '$clave';");

  if(!$update){
      echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
   
  }else {
      header("Location:../php/list_Prov.php");
  }
?>