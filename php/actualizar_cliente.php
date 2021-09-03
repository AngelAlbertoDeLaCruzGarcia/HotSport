<?php
  require('conexion.php');
$id=$_POST['id'];
  $nombre=$_POST['nombre'];
  $Apaterno=$_POST['Ap'];
  $Amaterno=$_POST['Am'];
  $cel=$_POST['Cel'];
  $est=$_POST['estado'];
  $ciu=$_POST['Ciudad'];
  $col=$_POST['Colonia'];
  $cal=$_POST['Calle'];
  $email=$_POST['Correo'];
  $user=$_POST['usuario'];
  $psw=$_POST['password'];

  $update=mysqli_query($conexion,"CALL spupdcliente('$nombre',
  '$Apaterno','$Amaterno','$cel','$est','$ciu','$cal','$col','$email',$id);");
  
  $upduser=mysqli_query($conexion,"UPDATE tbluser
  SET vchPassword = '$psw'
  WHERE vchUser = '$user';");

  if(!$update||!$upduser){
      echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
   
  }else {
      header("Location:../admi/list_Cliente.php");
  }
?>