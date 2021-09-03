<?php
require('conexion.php');
$tipo=$_POST['tipouser'];
$user=$_POST['Usuario'];
$pass=$_POST['Password'];

$searchUser=mysqli_query($conexion,"SELECT vchUser  FROM tbluser where vchUser='$user'");
$rows=($searchUser);

if(mysqli_num_rows($rows)==0)
    {
			$insert=mysqli_query($conexion,"CALL spinsertuser('$user','$pass',$tipo);");

			if (!$insert)
			{
				echo  "<script type=\"text/javascript\">alert(\"Error guardar los datos intente de nuevo\");</script>";
			}
			else
			{
				header("Location:../admi/list_User.php");
					echo "se guardaron los datos";
			}
		
    }
    else
    echo"<script type=\"text/javascript\">alert(\"Error usuario repetido:(\");</script>";
    echo"<script>window.location='../admi/frmUser.php';</script>";

?>

