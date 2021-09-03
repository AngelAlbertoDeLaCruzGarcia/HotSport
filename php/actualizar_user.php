<?php
  require('conexion.php');
  $tipo=$_POST['user'];
  $user=$_POST['us'];
  $psw=$_POST['pas'];
  
  $upduser=mysqli_query($conexion,"CALL spupduser('$user','$psw',$tipo);");

  if(!$upduser){
      echo  "<script type=\"text/javascript\">alert(\"Error al actualizar intente de nuevo\");</script>";  
   
  }else {
      header("Location:../admi/list_User.php");
  }
?>