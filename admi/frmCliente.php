<?php
session_start();
include '../php/conexion.php';

$usuario=$_SESSION['user'];
$sql="SELECT * FROM tbluser WHERE vchUser='$usuario';";
$res=mysqli_query($conexion,$sql);
  if(mysqli_num_rows($res)>0)
  {
    $row=mysqli_fetch_assoc($res);
    $clave=$row['intTipoUser'];
}
if($clave==1 && isset($usuario)) {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Clientes</title>
	<link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="../validaciones/validarClie.js"></script>
 <script>
    function atras(){
				history.back();
			}

			//forward: cargar la url siguiente en el historial
			function adelante(){
				history.forward();
			}
            </script>
</head>
<body>
<header>
    <?php include('../php/head.php');
    ?>
    </header><br><br><br>
	    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>            

    <section class="main">

                <form action="../php/guardar_cliente.php" class="form_user" method="POST" enctype="multipart/form-data" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Registro de Clientes</h3>
                        <div class="conten-inputs">
                            
                              Nombre:
                              <input type="text" id="Nombre" name="nombre"  placeholder="Nombre(s)" class="input-100" maxlength="80">
                              Apellido paterno:
                              <input type="text" id="Apaterno" name="Ap" placeholder="Apellido Paterno" class="input-100" maxlength="80">
                              Apellido materno:
                              <input type="text" id="Amaterno" name="Am" placeholder="Apellido Materno" class="input-100" maxlength="80">
                              Celular:<p>
                              <input type="text" id="Tel" name="Cel" placeholder="Celular" class="input-48" maxlength="10">
                              
                              <select id="Estado" name="estado"  class="input-48">
                                <option>Seleccione un estado</option>
                                <option>Aguascalientes</option>
                                <option>Hidalgo</option>
                                <option>Mexico</option>
                                <option>Sonara</option>
                                <option>Tamaulipas</option>
                                <option>Veracruz</option>
                              </select>
                              <br>Email:
                              <input type="text" id="Email" name="Correo" placeholder="Correo" class="input-100">
                              Ciudad:
                              <input type="text" id="Ciudad" name="Ciudad" placeholder="Ciudad" maxlength="20" class="input-100">
                              Colonia:
                              <input type="text" id="Colonia" name="Colonia" placeholder="Colonia" maxlength="20" class="input-100">
                              Calle:
                              <input type="text" id="Calle" name="Calle" placeholder="Calle" maxlength="30" class="input-100">
                              Usuario:
                              <input type="text" id="Usuario" name="Usuario" placeholder="Usuario" maxlength="30" class="input-100">
                              Contraseña:
                              <input type="Password" id="Passw" name="Password" placeholder="Contraseña" maxlength="30" class="input-100">
                               <p></p>
                              <input type="submit" value="Agregar" name="btn_enviar" class="btn_enviar">
                              <input type="reset" value="Borrar" class="btn_borrar">
                              
                        </div>
                </form>

        </div>

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
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>

