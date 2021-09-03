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
    <title>Registro de productos</title>
	  <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <link rel="stylesheet" href="../php/head.php">
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
<body>
<header>
    <?php include('../php/head.php');
    ?>
</header><br><br><br>
    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>            

    <section class="main">
                <form action="../php/guardar_producto.php" class="form_user" method="POST" enctype="multipart/form-data" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Registro de productos</h3>
                        <div class="conten-inputs">
                        <p>
                        Codigo:                 
                          <input type="text" id="Codigo" name="codigo"  placeholder="Codigo de producto" class="input-100">
                          Nombre del producto:                 
                          <input type="text" id="NombreP" name="nombreP"  placeholder="Nombre producto" class="input-100">
		  	                  Descripcion:
		 	                    <input type="text" id="descripcion" name="Descripcion" class="input-100">
                          Categoria:     
                          <input type="text" value="Accesorios"  readonly name="cat" id="Cat" class="input-100">
                          
                          Marca:
                          <select name="marca" id="Marca" class="input-100">
                            <option>Nike</option>
                            <option>Adidas</option>
                            <option>Reebook</option>
                            <option>Pirma</option>
                            <option>Joma</option>
                            <option>Puma</option>
                            <option>Charly</option>
                            <option>Manriquez</option>
                            <option>Conconrd</option>
                            <option>Under Armor</option>
                            <option>Fila</option>
                            <option>Vans</option>
                            <option>Converse</option>
                            <option>Wilson</option>
                            <option>Void</option>
                            <option>Supra</option>
                            <option>Jordan</option>
                            <option>Lotto</option>
                          </select><br><br>

                          Precio:
                          <input type="text" id="Precio" name="precio" placeholder="Precio" class="input-100"><br>
                              
                          Talla:
                          <select name="talla" id="Talla" class="input-100">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
  
                          </select><br><br>

                          Cantidad:
                          <input type="text" id="Cantidad" name="cantidad" placeholder="Cantidad" class="input-100">
                          <input type="file" name="foto" class="input-100" required>
                        </p>
                              <input type="submit" value="Agregar" name="btn_enviar" class="btn_enviar">
                              <input type="reset" value="Borrar" class="btn_borrar">    
                        </div>

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
