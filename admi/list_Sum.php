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
    <title>Ingreso de Productos</title>
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
 <section class="nav">
    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>    

</section>


    <section >   
        <a href="../admi/frmSum.php"><input type="submit" name="btn_enviar" class="btn_nuevo" value="Nuevo"></a>

    <form action="../admi/buscar_sum.php" method="GET" class="form_buscar">
            <input type="text" name="buscar" id="buscar" placeholder="Fecha,Provedor,Producto">
            <input type="submit" name="btn_enviar" class="btn_buscar" value="Buscar">
        </form><br><br><br>
        <center> <font color = "white"><h1>Ingreso de Productos</h1></font>
        </center>

        <center>
              <div class="tam">
                    <table>
                        <thead>
                            <td>Fecha y Hora</td>
                            <td>Precio</td>
                            <td>Cantidad</td>
                            <td>Producto</td>
                            <td>Proveedor</td>
                            <td> </td>
                            <td> </td>
                        </thead>

                      <?php 
                        include('../php/conexion.php');
                        $registro=mysqli_query($conexion,"SELECT COUNT(*) as registrot FROM tblsuministrados_por");
                        $res=mysqli_fetch_array($registro);
                        $total=$res['registrot'];
                        $por_pagina=3;
                        if(empty($_GET['pagina'])){
                            $pagina=1;
                        }else{
                            $pagina=$_GET['pagina'];
                        }
                        $desde=($pagina-1)*$por_pagina;
                        $total_paginas=ceil($total/$por_pagina);
                        $query=mysqli_query($conexion,"CALL splistsum($desde,$por_pagina);");
                        mysqli_close($conexion);
                        $row=mysqli_num_rows($query);
                        if($row>0){

                            while ($fila=mysqli_fetch_array($query)) {?>
                      <tr>
                         
                           
                         <td><?php echo $fila['dtFecha'];?></td>
                         <td><?php echo $fila['fltPrecio'];?> </td> 
                         <td><?php echo $fila['intCantidad'];?> </td>
                         <td><?php echo $fila['vchNombre']." ".$fila['vchMarca'];?> </td>
                         <td><?php echo $fila['vchRFC'];?> </td>
                         <td><a href="../admi/mod_Sum.php?Id=<?php echo $fila['intIdSub']?>">Editar</a></td>
                         <td><a href="#" onclick="preguntar(<?php echo $fila['intIdSub']?>)">Eliminar</a></td>
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
                window.location.href="../php/borrar_sum.php?Id="+del;
            }
        }
    </script>
</body>
</html>

