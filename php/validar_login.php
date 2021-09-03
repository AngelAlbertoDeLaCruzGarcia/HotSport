<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

	<head>
		<title>Validando...</title>
		<meta charset="utf-8">
	</head>
</head>

<body>
	<?php
	require('conexion.php');
	if (isset($_POST['login'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$ConsultUser = mysqli_query(
			$conexion,
			"SELECT vchUser,vchPassword,intTipoUser FROM tbluser
            WHERE vchUser='$user' AND vchPassword='$pass'"
		);
		if (mysqli_num_rows($ConsultUser) > 0) {
			$row = mysqli_fetch_array($ConsultUser);
			if ($row['vchUser'] == $user && $row['vchPassword'] == $pass) {
				$_SESSION["user"] = $row['vchUser'];
				$_SESSION["tipo"] = $row['intTipoUser'];
				if ($row['intTipoUser'] == 1) {
					echo 'Iniciando sesión para ' . $_SESSION['user'] . ' <p>';
					echo '<script> window.location="../admi/index.php"; </script>';
				} else {
					if ($row['intTipoUser'] == 3) {
						echo 'Iniciando sesión para ' . $_SESSION['user'] . ' <p>';
						echo '<script> window.location="../user/index.php"; </script>';
					}
				}
			} else {
				echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
				echo '<script> window.location="../login.php"; </script>';
			}
		} else {
			echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
			echo '<script> window.location="../login.php"; </script>';
		}
	}
	?>
</body>

</html>