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
$prod=$_GET['Nombre'];

if(isset($_GET['Nombre']))
{
  $sql="SELECT * FROM tblproductos WHERE intIdproducto=$prod";
  $resultado=mysqli_query($conexion,$sql);
  if(mysqli_num_rows($resultado)>0)
  {
    $row=mysqli_fetch_assoc($resultado);
    $clave=$row['intIdproducto'];
    $nombrep= $row['vchNombre'];
    $descripcion=$row['vchDescripcion'];
    $categoria= $row['vchTipop'];
    $marca= $row['vchMarca'];
    $cantidad= $row['intCantidad'];
    $precio= $row['fltPrecio'];
    $talla= $row['vchTalla'];
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/css" media="screen" href="main.css">
      <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="../validaciones/validarPro.js"></script>
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
 <?php include '../php/head.php';?>

 </header><br><br><br>
  <section class="main">
     <form action="../php/Actualizar_prod.php" class="form_user" method="POST" onsubmit="return validaciones(this);">
        <h2 class="form-titulo">Editar producto </h2>
        <div class="conten-inputs">
	  
          Codigo:
          <input type="text" name="id" readonly value="<?=$clave?>" class="input-100">

          Nombre:
          <input type="text" id="NombreP" name="nombrep" value="<?=$nombrep?>" class="input-100">
          Descripcion:
           <input type="text" id="descripcion" name="Descripcion" value="<?=$descripcion?>" class="input-100">
          Categoria:
          <select name="cat" id="Cat" value="<?=$categoria?>" class="input-100">
            <option>Infantiles</option>
            <option>Caballero</option>
            <option>Dama</option>
          </select><br>

          Marca:
          <input type="text" id="Marca" name="marca" value="<?=$marca?>" class="input-100"><br>

          Precio:
          <input type="text" id="Precio" name="precio" value="<?=$precio?>" class="input-100"><br>

          Talla:
          <input type="text" id="Talla" name="talla" value="<?=$talla?>" placeholder="Talla" class="input-100"><br>

          Cantidad:
          <input type="text" id="Cantidad" name="cantidad" value="<?=$cantidad?>" placeholder="Cantidad" class="input-100">
          

          <input type="submit" value="Enviar" class="btn_enviar">
         </div>
       </form>

        

    </section>


      
  
</html>
<?php include '../php/footer.php';?>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>