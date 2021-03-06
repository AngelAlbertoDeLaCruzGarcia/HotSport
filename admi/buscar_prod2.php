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
    <title>Listado de Productos</title>
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
<header>
    <?php include('../php/head.php');
    ?>
</header><br><br><br>
<body>
 <section class="nav">
    <button class="btn_nav1" onclick="atras()">Atrás</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>    

</section>

    <section >
    <a href="../admi/frm_productos.php"><input type="submit" name="btn_enviar" class="btn_nuevo" value="Nuevo"></a>

<form action="../admi/buscar_prod2.php" method="GET" class="form_buscar">
        <input type="text" name="buscar" id="buscar" placeholder="Nombre,Marca,Categoria">
        <input type="submit" name="btn_enviar" class="btn_buscar" value="Buscar">
    </form><br><br><br>
        <center> <font color = "white"><h1>Lista de Productos</h1></font>
        </center>

        <center>
              <div class="tam">
                    <table>
                        <thead>
                            <td>Producto</td>
                            <td>categoria</td>
                            <td>marca</td>
                            <td>cantidad</td>
                            <td>precio</td>
                            <td> </td>
                            <td> </td>
                        </thead>

                      <?php 
                        include('../php/conexion.php');
                        $dato=strtolower($_REQUEST['buscar']);
                        if(empty($dato)){
                            header('location: list_Productos.php');
                        }
                        $registro=mysqli_query($conexion,"SELECT COUNT(DISTINCT vchNombre) as registrot FROM tblproductos");
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
                        $query=mysqli_query($conexion,"SELECT * FROM tblproductos 
                        WHERE (vchNombre LIKE '%$dato%' OR
                        vchTipop LIKE '%$dato%' OR
                        vchMarca LIKE '%$dato%' ) 
                        
                        ORDER BY vchNombre ASC LIMIT $desde,$por_pagina");
                        mysqli_close($conexion);
                        $row=mysqli_num_rows($query);
                        if($row>0){

                            while ($fila=mysqli_fetch_array($query)) { ?>
                      <tr>
                         <td><?php echo $fila['vchNombre']?></td>
                         <td><?php echo $fila['vchTipop']?> </td>
                         <td><?php echo $fila['vchMarca']?> </td>
                         <td><?php echo $fila['intCantidad']?> </td>
                         <td><?php echo $fila['fltPrecio']?> </td> 
                         <td><a href="editar_prod.php?Nombre=<?php echo $fila['vchNombre']?>">Editar</a></td>
                         <td><a href="#" onclick="preguntar(<?php echo $fila['intIdproducto']?>)">Eliminar</a></td>
                       </tr>
                       <?php } } ?>
                    </table>
               </div>
               <div class="paginador">
                
                <?php
                    if($pagina!=1){
                ?>
                <a href="?pagina=<?php echo 1;?>&buscar=<?php echo $dato;?>">|< Primero   </a>
                <a href="?pagina=<?php echo $pagina-1;?>&buscar=<?php echo $dato;?>"><< Anterior</a>
                <?php 
                    }
                    for($i=1; $i <=$total_paginas; $i++){
                        if($i==$pagina){
                            echo $i;
                        }else{
                            echo '<a href="?pagina='.$i.'&buscar='.$dato.'">'.$i.'</a>'." ";
                        }
                    }
                    if($pagina!=$total_paginas)
                    {                    
                ?>
                <a href="?pagina=<?php echo $pagina+1; ?>&buscar=<?php echo $dato;?>">Siguiente>></a>
                <a href="?pagina=<?php echo $total_paginas; ?>&buscar=<?php echo $dato;?>">Ultimo>|</a>
                    <?php }?>
            
    </div>
        </center>

    </section>
    <script type="text/javascript">
        function preguntar(nombrep){
            if(confirm('¿Esta seguro que desea eliminar?')){
                window.location.href="../php/eliminar.php?Id="+nombrep;
            }
        }
    </script><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php include '../php/footer.php';?>
</body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>

