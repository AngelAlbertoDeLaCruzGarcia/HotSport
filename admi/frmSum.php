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
    </header><br><br><br>
	    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>            

    <section class="main">

                <form action="../php/guardar_sum.php" class="form_user" method="POST" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Ingreso producto</h3>
                        <div class="conten-inputs">
                           
                            Fecha:               
                            <input type="date" id="Fecha" name="fecha" class="input-100">
                            Hora:               
                            <input type="time" id="Hora" name="hora" value="" class="input-100">

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
                              Proveedor:
                              <select name="prov" id="Prov" class="input-100">
                                <option value="0" >Seleccione un Provedor</option>
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

