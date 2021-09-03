
<?php
require('../php/conexion.php');
$prov="SELECT * FROM tblprovedor";
$resprov=$conexion->query($prov);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de proveedores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">

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
    </header><br><br><br><br><br><br>
    <section  >
        <center><font color="white"><h1>Lista de proveedores</h1></center></font>
        <center>
              <div class="tam">
                    <table >
                        <thead>
                        
                        <td>RFC</td>
                        <td>Empresa</td>
                        <td>Nombre</td>
                        
                        <td>Celular</td>
                        
                        <td>Email</td>
                        
                        <td></td>
                        <td></td></thead>
                        <?php
                    while ($fila=mysqli_fetch_assoc($resprov)) {
                ?>
             <tr>
              <td><?php echo $fila['vchRFC'];?> </td>
              <td><?php echo $fila['vchEmpresa'];?> </td>
              <td><?php echo $fila['vchNombre']; echo" "; echo $fila['vchApaterno']; echo " "; echo $fila['vchAmaterno'];?></td>
              <td><?php echo $fila['vchCelular'];?> </td>
              
              <td><?php echo $fila['vchEmail'];?> </td>
              <td width="40"><a href="../php/conf.php?Id=<?=$fila['vchRFC']?>" class="">Eliminar</a></td>
              <td width="43"><a href="../php/mod_Prov.php?Id=<?=$fila['vchRFC']?>" class="">Editar</a></td>
            </tr>
            <?php
                    };
                ?>
                    </table>


            </div>
            </center>

    </section>
    <script type="text/javascript">
        function preguntar(id){
            if(confirm('¿Esta seguro que desea eliminar?')){
                window.location.href="../php/borrar_prov.php?del="+id;
            }
        }
    </script>
        
</body>
</html>
