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
 <body>
    <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Registro de Proveedores</title>
	   <link rel="stylesheet" href="../css/style_index.css">
     <link rel="stylesheet" href="../font/style.css">
     <link rel="stylesheet" href="../css/formularios.css">
     <script type="text/javascript" src="../validaciones/validarProve.js"></script>
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
    <header>
      <?php include('../php/head.php');
      ?>
    </header><br><br><br>
    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>            

<section class="main">

  <form action="../php/guardar_prov.php" class="form_user" method="POST" enctype="multipart/form-data" onsubmit="return validaciones(this);">
        <h3 class="form-titulo">Registro de proveedores</h3>
        <div class="conten-inputs">
        <p>
      
        RFC:
        <input type="text" id="RFC" name="RFC"  placeholder="RFC" class="input-100">     
        Empresa:       
        <input type="text" id="Empresa" name="empresa"  placeholder="Empresa" class="input-100">

        Nombre:
        <input type="text" id="Nombre" name="nombre" placeholder="Nombre" class="input-100">

        Apellido Paterno:
        <input type="text" id="Apaterno" name="Apaterno" placeholder="Apellido paterno" class="input-100">

        Apellido Materno:
        <input type="text" id="Amaterno" name="Amaterno" placeholder="Apellido materno" class="input-100">

        Telefono:
        <input type="text" id="Tel" name="tel" placeholder="10 caracteres" maxlength="10" class="input-100">

        Email:
        <input type="text" id="Email" name="email" placeholder="Debes de introducir tu email" class="input-100">
</p>
        
        <input type="submit" value="Agregar" name="btn_enviar" class="btn_enviar">
        <input type="reset" value="Borrar" class="btn_borrar">    
      </div>
    </form>
</section>
    <div class="footer">		

    </div> 
 </body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>