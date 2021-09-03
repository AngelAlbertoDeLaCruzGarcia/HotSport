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
  $sql="SELECT * FROM tblventa WHERE intIdventa=$id";
  $resultado=mysqli_query($conexion,$sql);
  if(mysqli_num_rows($resultado)>0)
  {
    $row=mysqli_fetch_assoc($resultado);
    $id=$row['intIdventa'];
    $fecha= $row['dtFecha'];
    $producto=$row['intIdproducto'];
    $cliente= $row['intIdcliente'];
    $cantidad= $row['intCantidad'];
    $precio= $row['fltPrecio'];
    $pago= $row['intIdmet_pago'];
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title>Editar venta</title>
      <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="../php/validar.js"></script>
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
  <section class="main">
     <form action="../php/actualizar_ventas.php" class="form_user" method="POST" onsubmit="return validaciones(this);">
        <h2 class="form-titulo">Editar venta</h2>
        <div class="conten-inputs">
        Fecha:               
                            <input type="datetime" id="Fecha" name="fecha" value="<?=$fecha?>" class="input-100">
                              Cantidad:
                              <input type="text" id="Cantidad" name="cantidad" value="<?=$cantidad?>" placeholder="Cantidad" class="input-100">
				<input type="hidden" id="" name="id" value="<?=$id?>" placeholder="Cantidad" class="input-100">
                              Precio:
                              <input type="text" id="Precio" name="precio" value="<?=$precio?>" placeholder="Precio" class="input-100">
                              Producto:

                              <select name="producto" id="Producto" class="input-100">
                              <?php
                                            $product="SELECT * FROM tblproductos WHERE intIdproducto=$producto";
                                            $resprod=mysqli_query($conexion,$product);
                                            $row=mysqli_fetch_assoc($resprod)?>

                                <option value="<?=$producto?>"><?php echo $row['vchNombre'];?></option>
                                <?php
                                            $prod="SELECT * FROM tblproductos";
                                            $res=mysqli_query($conexion,$prod);
                                             while ($fila=mysqli_fetch_assoc($res)) {
                                                        ?>

                                <option value="<?php echo $fila['intIdproducto']?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
										                  }
                                ?>
                              </select><br>


                              
                              Cliente:
                              <select name="cliente" id="Cliente" class="input-100">
                              <?php
                                            $client="SELECT * FROM tblcliente WHERE intIdcliente=$cliente";
                                            $rescliente=mysqli_query($conexion,$client);
                                            $fil=mysqli_fetch_assoc($rescliente); ?>            

                                <option value="<?=$cliente?>"><?php echo $fil['vchNombre'];?></option>
                                <?php
                                            $prov="SELECT * FROM tblcliente";
                                            $resprov=mysqli_query($conexion,$prov);
                                             while ($fil=mysqli_fetch_assoc($resprov)) {
                                                        ?>

                                <option value="<?php echo $fil['intIdcliente']?>"><?php echo $fil['vchNombre'];?></option>
                                <?php
										                  }
                                ?>
                              </select><br>



                              Metodo de pago:
                              <select name="pago" id="Pago" class="input-100">
                              <?php
                                            $pag="SELECT * FROM tblmet_pago WHERE intIdmet_pago=$pago";
                                            $respag=mysqli_query($conexion,$pag);
                                            $filas=mysqli_fetch_assoc($respag); ?>            

                                <option value="<?=$filas['intIdmet_pago']?>"><?php echo $filas['vchDescripcion'];?></option>
                                
                                <?php
                                            $pagos="SELECT * FROM tblmet_pago";
                                            $respagos=mysqli_query($conexion,$pagos);
                                             while ($filap=mysqli_fetch_assoc($respagos)) {
                                                        ?>

                                <option value="<?php echo $filap['intIdmet_pago']?>"><?php echo $filap['vchDescripcion'];?></option>
                                <?php
										                  }
                                ?>
                              </select>

          <input type="submit" value="Enviar" class="btn_enviar">
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