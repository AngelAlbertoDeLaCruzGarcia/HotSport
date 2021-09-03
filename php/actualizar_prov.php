<?php
  require('conexion.php');
  $clave=$_POST['clave'];
  $nombre=$_POST['nombre'];
  $Apaterno=$_POST['Ap'];
  $Amaterno=$_POST['Am'];
  $cel=$_POST['Cel'];
  $empre=$_POST['emp'];
  $email=$_POST['email'];
  
  $update=mysqli_query($conexion,"CALL spupdprov
  ('$clave','$empre','$nombre','$Apaterno','$Amaterno','$cel','$email');"); 

  if(!$update){
      echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
   
  }else {
      header("Location:../admi/list_Prov.php");
  }
?>