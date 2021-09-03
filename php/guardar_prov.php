<?php
require('conexion.php');
$rfc=$_POST['RFC'];
$nombre=$_POST['nombre'];
$empresa=$_POST['empresa'];
$Apaterno=$_POST['Apaterno'];
$Amaterno=$_POST['Amaterno'];
$cel=$_POST['tel'];
$email=$_POST['email'];


$searchRFC=mysqli_query($conexion,"SELECT vchRFC  FROM tblprovedor where vchRFC='$rfc'");
$rows=($searchRFC);

if(mysqli_num_rows($rows)==0)
    {
        $insertar=mysqli_query($conexion,"CALL spinsertprov('$rfc','$empresa','$nombre','$Apaterno','$Amaterno','$cel','$email');");

		if (!$insertar)
		{
			echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
		}
		else
		{
			header("Location:../admi/list_Prov.php");
				echo "se guardaron los datos";
		}
    }
    else
    echo"<script type=\"text/javascript\">alert(\"Error al agregar\");</script>";
    echo"<script>window.location='../admi/list_Prov.php';</script>";

?>

