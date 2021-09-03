<!DOCTYPE html>
<html lang="en">
 <body>
    <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Registro de Proveedores</title>
	   <link rel="stylesheet" href="../formularioprov/css/style_index.css">
     <link rel="stylesheet" href="../font/style.css">
     <link rel="stylesheet" href="../formularioprov/css/formularios.css">
     
    </head>
    <header>
	    <nav class="navegacion">
		    <ul class="menu">
          <li><a href="#"><span class="icon-home"></span> Inicio</a></li>
		    </ul>
	    </nav>
    </header><br><br><br><br><br>
<section class="main">

  <form action="../prov/php/guardar_prov.php" class="form_user" method="POST" enctype="multipart/form-data">
        <h3 class="form-titulo">Registro de proveedores</h3>
        <div class="conten-inputs">
        <p>
      
        RFC:
        <input type="text" id="RFC" name="RFC"  placeholder="RFC" class="input-100" required>     
        Empresa:       
        <input type="text" id="empresa" name="empresa"  placeholder="Empresa" class="input-100" required>

        Nombre:
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input-100" required>

        Apellido Paterno:
        <input type="text" id="Apaterno" name="Apaterno" placeholder="Apellido paterno" class="input-100" required>

        Apellido Materno:
        <input type="text" id="Amaterno" name="Amaterno" placeholder="Apellido materno" class="input-100" required>

        Telefono:
        <input type="text" name="tel" placeholder="10 caracteres" pattern="[0-9]+" maxlength="10" class="input-100" required>

        Email:
        <input type="email" name="email" placeholder="Debes de introducir tu email" class="input-100" required>
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