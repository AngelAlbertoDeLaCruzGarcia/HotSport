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
<html>
<head>
    <meta charset="utf-8" />
    <title>Listado de Clientes</title>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../css/list_form.css">
    <link rel="stylesheet" href="../font/style.css">
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
<?php
include '../php/head.php';?>
</header><br><br><br>
        
 <section class="nav">
    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>    

</section>

    <section>
        <a href="../admi/frmCliente.php"><input type="submit" name="btn_enviar" class="btn_nuevo" value="Nuevo"></a>
        <form action="../admi/buscar_cliente.php" method="GET" class="form_buscar">
        <input type="text" name="buscar" id="buscar" placeholder="Nombre, Email, Domicilio">
        <input type="submit" name="btn_enviar" class="btn_buscar" value="Buscar">
        </form><br><br><br>
        <center> <font color = "white"><h1>Lista de Clientes</h1></font>
        </center>

        <center>
              <div class="tam">
                    <table>
                        <thead>
                        
                        <td>  Nombre</td>
                        <td>Celular</td>
                        <td>Domicilio</td>
                        <td>Correo</td>
                        <td > </td>
                        <td > </td></thead>

                      <?php 
                        include('../php/conexion.php');
                        $registro=mysqli_query($conexion,"SELECT COUNT(*) as registrot FROM tblcliente");
                        $res=mysqli_fetch_array($registro);
                        $total=$res['registrot'];
                        $por_pagina=10;
                        if(empty($_GET['pagina'])){
                            $pagina=1;
                        }else{
                            $pagina=$_GET['pagina'];
                        }
                        $desde=($pagina-1)*$por_pagina;
                        $total_paginas=ceil($total/$por_pagina);
                        $query=mysqli_query($conexion,"CALL splistarcliente($desde,$por_pagina);");
                        mysqli_close($conexion);
                        $row=mysqli_num_rows($query);
                        if($row>0){
                            while ($fila=mysqli_fetch_assoc($query)) { ?>
                        <tr>
                        
                        <td><?php echo $fila['vchNombre'];?>   <?php echo $fila['vchApaterno'];?>   <?php echo $fila['vchAmaterno'];?></td>
                        <td><?php echo $fila['vchCelular'];?> </td>
                        <td><?php echo $fila['vchEstado']; echo", "; echo $fila['vchCiudad']; echo", "; echo $fila['vchColonia']; echo ", "; echo $fila['vchCalle'];?> </td>
                        <td><?php echo $fila['vchEmail'];?> </td>          
                        <td><a href="../admi/mod_Cliente.php?Id=<?=$fila['intIdcliente']?>" class="">Editar</a></td>
                        <td><a href="#" onclick="preguntar(<?php echo $fila['intIdcliente']?>)">Eliminar</a></td>
                        </tr>      
                       <?php } } ?>
                    </table>
               </div>
               <div class="paginador">
                    
                    <?php
                        if($pagina!=1){
                    ?>
                    <a href="?pagina=<?php echo 1;?>">|< Primero   </a>
                    <a href="?pagina=<?php echo $pagina-1;?>"><< Anterior</a>
                    <?php 
                        }
                        for($i=1; $i <=$total_paginas; $i++){
                            if($i==$pagina){
                                echo $i;
                            }else{
                                echo '<a href="?pagina='.$i.'">'.$i.'</a>'." ";
                            }
                        }
                        if($pagina!=$total_paginas)
                        {                    
                    ?>
                    <a href="?pagina=<?php echo $pagina+1; ?>">Siguiente>></a>
                    <a href="?pagina=<?php echo $total_paginas; ?>">Ultimo>|</a>
                        <?php }?>
                
            </div>
        </center>

    </section>

    <script type="text/javascript">
        function preguntar(del){
            if(confirm('¿Esta seguro que desea eliminar?')){
                window.location.href="../php/borrar_cliente.php?Id="+del;
            }
        }
    </script><br><br><br><br><br><br><br><br>
<?php include '../php/footer.php';?>
</body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>
