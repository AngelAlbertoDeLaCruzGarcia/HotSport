<?php
require('../php/conexion.php');
$fecha=$_POST['fecha'];
$cant=$_POST['cantidad'];
$precio=$_POST['precio'];
$prod=$_POST['producto'];
$prov=$_POST['prov'];
$hora=$_POST['hora'];

        $insertar=mysqli_query($conexion,"INSERT INTO tblsuministrados_por
		(dtFecha,fltPrecio,intCantidad,intIdproducto,vchRFC)
		VALUES ('$fecha $hora',$precio,$cant,$prod,'$prov')");

		if (!$insertar)
		{
			echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
		}
		else
		{
			header("Location:../admi/list_Sum.php");
				echo "se guardaron los datos";
		}
?>

