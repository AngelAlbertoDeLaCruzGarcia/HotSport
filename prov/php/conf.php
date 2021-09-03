<?php
include('../php/conexion.php');
$id=$_GET['Id'];
$sql="SELECT * from tblprovedor WHERE vchRFC='$id'";
$res=$conexion->query($sql);
$row=$res->fetch_assoc();
echo $row[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    ¿Desea eliminar al proveedor?<br>
    <?php
        echo $row['vchNombre']." ".$row['vchApaterno']." ".$row['vchAmaterno'];
    
    ?>
    de la empresa 
    <?php
        echo $row['vchEmpresa'];
    
    ?>
    <br>
    <a href="../php/borrar_prov.php">SI </a>/
    <a href="../php/list_Prov.php">NO</a>
</body>
</html>