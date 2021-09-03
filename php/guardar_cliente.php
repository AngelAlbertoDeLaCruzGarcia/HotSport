<?php
require('conexion.php');
$nombre=$_POST['nombre'];
$Apaterno=$_POST['Ap'];
$Amaterno=$_POST['Am'];
$cel=$_POST['Cel'];
$est=$_POST['estado'];
$ciu=$_POST['Ciudad'];
$col=$_POST['Colonia'];
$cal=$_POST['Calle'];
$user=$_POST['Usuario'];
$pass=$_POST['Password'];
$email=$_POST['Correo'];

$searchUser=mysqli_query($conexion,"SELECT vchUser  FROM tbluser where vchUser='$user'");
$rows=($searchUser);

if(mysqli_num_rows($rows)==0)
    {
		$searchEmail=mysqli_query($conexion,"SELECT vchEmail  FROM tblcliente where vchEmail='$email'");
		$rows=($searchEmail);

		if(mysqli_num_rows($rows)==0)
    	{
			$insertar=mysqli_query($conexion,"
			CALL spinsertcliente('$nombre','$Apaterno','$Amaterno','$cel','$est','$ciu','$cal','$col','$email');");
			$searchCli=mysqli_query($conexion,"SELECT intIdcliente  FROM tblcliente where vchNombre='$nombre' and vchApaterno='$Apaterno' and vchAmaterno='$Amaterno'");
			$rows=$searchCli->fetch_assoc();
			$Id=$rows['intIdcliente'];
			$insert=mysqli_query($conexion,"INSERT INTO tbluser(vchUser,vchPassword,intIdcliente,intTipoUser)
			VALUES ('$user','$pass','$Id',3)");

			if (!$insertar && !$insert)
			{
				echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
			}
			else
			{
				header("Location:../admi/list_Cliente.php");
					echo "se guardaron los datos";
			}
		}
		else
		echo"<script type=\"text/javascript\">alert(\"Error correo repetido:(\");</script>";
		echo"<script>window.location='../admi/frmCliente.php';</script>";
    }
    else
    echo"<script type=\"text/javascript\">alert(\"Error usuario repetido:(\");</script>";
    echo"<script>window.location='../admi/frmCliente.php';</script>";

?>

