<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="css/style_index.css">
	<link rel="stylesheet" href="css/style_login.css">
	<link rel="stylesheet" href="font/style.css">
</head>

<body>
	<header>
		<?php
		session_start();
		$_SESSION['user'] = null;
		require('head.php');
		?>
	</header><br><br><br><br><br><br>
	<section class="main">

		<div class="login-box">
			<img src="img/avatar.png" class="avatar">
			<h1>Inice Sesion</h1>
			<form method="post" action="php/validar_login.php">
				<p>Username</p>
				<input type="text" name="username" required autofocus placeholder="Usuario">
				<p>Password</p>
				<input type="password" name="password" required placeholder="Contraseña">
				<input type="submit" name="login" value="Login">
				<a href="admi/frmCliente2.php">Registrarse</a>
			</form>


		</div>

	</section>
	<?php require('user/php/footer.php'); ?>

</body>

</html>