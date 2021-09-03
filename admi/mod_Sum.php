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
  $sql="SELECT * FROM tblsuministrados_por WHERE intIdSub=$id";
  $resultado=mysqli_query($conexion,$sql);
  if(mysqli_num_rows($resultado)>0)
  {
    $row=mysqli_fetch_assoc($resultado);
    $fecha= $row['dtFecha'];
    $cantidad= $row['intCantidad'];
    $precio= $row['fltPrecio'];
    $rfc=$row['vchRFC'];
    $prod= $row['intIdproducto'];
    
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="../validaciones/validarSum.js"></script>
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
     <form action="../php/actualizar_sum.php" class="form_user" method="post" onsubmit="return validaciones(this);">
        <h2 class="form-titulo">Editar</h2>
        <div class="conten-inputs">
        Fecha   / Hora:              
                            <input type="text" id="Fecha" name="fecha" readonly value="<?=$fecha?>" class="input-100">

                              Cantidad:
                              <input type="text" id="Cantidad" name="cantidad" value="<?=$cantidad?>" placeholder="Cantidad" class="input-100">

                              Precio:
                              <input type="text" id="Precio" name="precio" value="<?=$precio?>"  placeholder="Precio" class="input-100">
                              Producto:
                              <select name="producto" id="Producto" class="input-100">
                                <?php $sqli="SELECT * FROM tblproductos WHERE intIdproducto=$id";
                                 $rest=mysqli_query($conexion,$sqli);
                                 $fila=mysqli_fetch_assoc($rest); ?>
                                <option value="<?=$prod?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
                                            require('../php/conexion.php');
                                            $prod="SELECT * FROM tblproductos";
                                            $res=mysqli_query($conexion,$prod);
                                             while ($fila=mysqli_fetch_assoc($res)) {
                                                        ?>

                                <option value="<?php echo $fila['intIdproducto']?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
										                  }
                                ?>
                              </select><br>
                              Proveedor:
                              <select name="prov" id="Prov" class="input-100">
                                <?php $sqlprov="SELECT * FROM tblprovedor WHERE vchRFC='$rfc'";
                                 $respv=mysqli_query($conexion,$sqlprov);
                                 $fila=mysqli_fetch_assoc($respv); ?>
                                <option value="<?=$rfc?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
                                            $prov="SELECT * FROM tblprovedor";
                                            $resprov=mysqli_query($conexion,$prov);
                                             while ($fila=mysqli_fetch_assoc($resprov)) {
                                                        ?>

                                <option value="<?php echo $fila['vchRFC']?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
										                  }
                                ?>
                              </select>
          <input type="submit" name="enviar" value="Enviar" class="btn_enviar"  href="list_Productos.php" >
         </div>
       </form>

        

    </section>

    <?php include '../php/footer.php';?>
  
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>