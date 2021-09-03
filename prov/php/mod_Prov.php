<?php
require('../php/conexion.php');
$ID=$_GET['Id'];

if(isset($_GET['Id']))
{
    $sql="SELECT * FROM tblprovedor WHERE vchRFC='$ID'";
	$resultado=mysqli_query($conexion,$sql);
	if(mysqli_num_rows($resultado)>0)
	{
    $row=mysqli_fetch_assoc($resultado);
    $id=$row['vchRFC'];
    $empresa=$row['vchEmpresa'];
		$nombre=$row['vchNombre'];
        $ap=$row['vchApaterno'];
		$am=$row['vchAmaterno'];
        $cel=$row['vchCelular'];
        $email=$row['vchEmail'];
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar proveedor</title>
	<link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
<header>
		<nav class="navegacion">
			<ul class="menu">
        <li><a href="#"><span class="icon-home"></span> Inicio</a></li>
				<li><a href="#"><span class="icon-pushpin"></span> Nosotros</a></li>
				<li><a href="#"><span class=" icon-briefcase"></span> Servicios</a>
					<ul class="submenu">
						<li><a href="#">Servicio #1</a></li>
						<li><a href="#">Servicio #2</a></li>
						<li><a href="#">Servicio #3</a></li>
					</ul>
				</li>

			</ul>
		</nav>
    </header><br><br><br><br><br><br>
    <section class="main">

                <form action="../php/actualizar_prov.php" class="form_user" method="post">
                        <h2 class="form-titulo">Editar proveedor </h2>
                        <div class="conten-inputs">

                            <input type="text" name="clave" readonly value="<?=$id?>" class="input-100">
                            <input type="text" name="emp" value="<?=$empresa?>" placeholder="Empresa" maxlength="20" class="input-100" required>
                            <input type="text" name="nombre" value="<?=$nombre?>" placeholder="Nombre(s)" class="input-100" maxlength="80" required>
                              <input type="text" name="Ap" value="<?=$ap?>" placeholder="Apellido Paterno" class="input-100" maxlength="80" required>
                              <input type="text" name="Am" value="<?=$am?>" placeholder="Apellido Materno" class="input-100" maxlength="80" required>
                              <input type="text" name="Cel" value="<?=$cel?>" placeholder="Celular" class="input-48" pattern="[0-9]+" maxlength="10" required>
                              
                              <input type="email" name="email" value="<?=$email?>" placeholder="Email" maxlength="30" class="input-48" required>
                            <input type="submit" value="Agregar"  class="btn_enviar">
                            <input type="reset" value="Borrar" class="btn_borrar">
                        </div>
                </form>

        

    </section>
    <div class="footer">			
      <div class="footer1">
        <div class="copyright">
          <p class="derechos">©2019 Todos los Derechos Reservados</p>|<a href=""class="footerEscuela">HotSport</a>
        </div>
  
                <div class="information">
                  <a href="">Objetivo</a> || <a href="">Mision y Vision</a> || <a href="">Privacion de politicas</a> || <a href="">Terminos y Condiciones</a>
                </div>         
       </div>
            
    </div>
</body>
</html>

