<?php
$Servidor="localhost";
$NombreBD="bdhotsports";
$PassBD="";
$UserBD="root";
$conexion=new mysqli($Servidor,$UserBD,$PassBD,$NombreBD);
if($conexion->connect_errno)
echo"Error en la conexion a base de datos";
?>