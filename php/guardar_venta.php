<?php
require('../php/conexion.php');
$fecha=$_POST['fecha'];
$cant=$_POST['cantidad'];
$precio=$_POST['precio'];
$prod=$_POST['producto'];
$client=$_POST['cliente'];
$hora=$_POST['hora'];
$pago=$_POST['pago'];



        $insertar=mysqli_query($conexion,"CALL spinsertvent($precio,$cant,$prod,$client,$pago)");

		if (!$insertar)
		{
			echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
		}
		else
		{
			header("Location:../admi/list_Ventas.php");
				echo "se guardaron los datos";
		}
?>

