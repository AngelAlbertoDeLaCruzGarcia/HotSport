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
                <form action="../php/guardar_producto.php" class="form_user" method="POST" enctype="multipart/form-data" onsubmit="return validaciones(this);">
                        <h3 class="form-titulo">Registro de productos</h3>
                        <div class="conten-inputs">
                        <p>
                          Nombre del producto:                 
                          <input type="text" id="NombreP" name="nombreP"  placeholder="Nombre producto" class="input-100">
		  	                  Descripcion:
		 	                    <input type="text" id="descripcion" name="Descripcion" class="input-100">
                          Categoria:     
                          <select name="cat" id="Cat" class="input-100">
                            <option>Infantiles</option>
                            <option>Caballero</option>
                            <option>Dama</option>
                          </select><br>
                          
                          Marca:
                          <input type="text" id="Marca" name="marca" placeholder="Marca" class="input-100">

                          Precio:
                          <input type="text" id="Precio" name="precio" placeholder="Precio" class="input-100">
                              
                          Talla:
                          <input type="text" id="Talla" name="talla" placeholder="Talla" class="input-100">

                          Cantidad:
                          <input type="text" id="Cantidad" name="cantidad" placeholder="Cantidad" class="input-100">
                          <input type="file" name="foto" class="input-100" required>
                        </p>
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

