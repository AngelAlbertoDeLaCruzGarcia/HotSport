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
    <title>Ingreso de productos</title>
	  <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="validar.js"></script>
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

                <form action="../php/guardar_venta.php" class="form_user" method="POST" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Ventas</h3>
                        <div class="conten-inputs">

                              Cantidad:
                              <input type="text" id="Cantidad" name="cantidad" placeholder="Cantidad" class="input-100">

                              Precio:
                              <input type="text" id="Precio" name="precio" placeholder="Precio" class="input-100">
                              Producto:
                              <select name="producto" id="Producto" class="input-100">
                                <option value="0" >Seleccione un producto</option>
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
                              Cliente:
                              <select name="cliente" id="Cliente" class="input-100">
                                <option value="0" >Seleccione un cliente</option>
                                <?php
                                            $prov="SELECT * FROM tblcliente";
                                            $resprov=mysqli_query($conexion,$prov);
                                             while ($fila=mysqli_fetch_assoc($resprov)) {
                                                        ?>

                                <option value="<?php echo $fila['intIdcliente']?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
										                  }
                                ?>
                              </select><br>
                              Metodo de pago:
                              <select name="pago" id="Pago" class="input-100">
                                <option value="0" >Seleccione un tipo de pago</option>
                                <?php
                                            $pago="SELECT * FROM tblmet_pago";
                                            $respago=mysqli_query($conexion,$pago);
                                             while ($fila=mysqli_fetch_assoc($respago)) {
                                                        ?>

                                <option value="<?php echo $fila['intIdmet_pago']?>"><?php echo $fila['vchDescripcion'];?></option>
                                <?php
										                  }
                                ?>
                              </select>

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

