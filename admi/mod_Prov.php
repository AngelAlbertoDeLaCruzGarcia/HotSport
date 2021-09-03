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
<body>
<header>
      <?php include('../php/head.php');
      ?>
    </header><br><br><br>
        <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>            

    <section class="main">

                <form action="../php/actualizar_prov.php" class="form_user" method="post" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Editar proveedor </h3>
                        <div class="conten-inputs">
                        <p>
                          RFC:
                          <input type="text" id="RFC" name="clave" readonly value="<?=$id?>" class="input-100">
                          Empresa:
                          <input type="text" id="Empresa" name="emp" value="<?=$empresa?>" placeholder="Empresa" maxlength="20" class="input-100">
                          Nombre:
                          <input type="text" id="Nombre" name="nombre" value="<?=$nombre?>" placeholder="Nombre(s)" class="input-100">
                          Apellido Paterno:
                          <input type="text" id="Apaterno" name="Ap" value="<?=$ap?>" placeholder="Apellido Paterno" class="input-100">
                          Apellido Materno:
                          <input type="text" id="Amaterno" name="Am" value="<?=$am?>" placeholder="Apellido Materno" class="input-100">
                          Telefono:
                          <input type="text" id="Tel" name="Cel" value="<?=$cel?>" placeholder="Celular" maxlength="10" class="input-100">
                          Email: 
                          <input type="text" id="Email" name="email" value="<?=$email?>" placeholder="Email" maxlength="30" class="input-100">
                        </p>
                            <input type="submit" value="Agregar"  class="btn_enviar">
                        </div>
                </form>

        

    </section>

<?php include '../php/footer.php';?>
</body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>

