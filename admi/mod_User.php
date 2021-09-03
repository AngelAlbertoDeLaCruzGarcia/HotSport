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
if($clave==1 && isset($usuario)) {
$id=$_GET['Id'];

if(isset($_GET['Id']))
{
  $sql="SELECT * FROM tbluser WHERE intIdUser=$id";
  $resultado=mysqli_query($conexion,$sql);
  if(mysqli_num_rows($resultado)>0)
  {
    $row=mysqli_fetch_assoc($resultado);
    $user= $row['vchUser'];
    $client= $row['intIdcliente'];
    $psw= $row['vchPassword'];
    $tipo= $row['intTipoUser'];
    
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Usuarios</title>
	<link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">

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
                <br>
                <form action="../php/actualizar_user.php" class="form_user" method="POST" enctype="multipart/form-data" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Registro de Usuarios</h3>
                        <div class="conten-inputs">
                                                 
                              Usuario:
                              <input type="text" id="Usuario" name="us" value="<?=$user ?>" readonly placeholder="Usuario" maxlength="30" class="input-100">
                              Contraseña:
                              <input type="Password" id="Passw" name="pas" value="<?=$psw?>" placeholder="Contraseña" maxlength="30" class="input-100">
                              Tipo de usuario:
                              <select id="user" name="user"  class="input-48">
                                <?php $sql="SELECT * FROM tbltipouser WHERE intTipoUser=$tipo";
                                 $rest=mysqli_query($conexion,$sql);
                                 $fila=mysqli_fetch_assoc($rest); ?>
                                <option value="<?=$tipo?>"><?php echo $fila['vchTipo'];?></option>
                                <?php $tip="SELECT * FROM tbltipouser ";
                                 $rest=mysqli_query($conexion,$tip);
                                  while($row=mysqli_fetch_assoc($rest)){ ?>
                                  <option value="<?php echo $row['intTipoUser']?>"><?php echo $row['vchTipo'];?></option>
                                  <?php } ?>
                              </select>
                                  
                               
                              <input type="submit" value="Agregar" name="btn_enviar" class="btn_enviar">
                              
                        </div>
                </form>

        </div>

    </section>
    <br><br><br><br><br><br><br>
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
