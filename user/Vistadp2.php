<?php 
    require('../php/conexion.php');
    $ID=$_GET['tblproductos'];
    $sql="SELECT * FROM tblproductos WHERE intIdproducto=$ID";
    $resProd=$conexion->query($sql);
    $row=mysqli_fetch_assoc($resProd);

?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>

    <title><?php echo $row['vchMarca']." ".$row['vchNombre'];?></title>
    <link rel="stylesheet" href="css/carrito2.css" type="text/css">
    <link rel="stylesheet" href="../css/style_index.css">
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
<?php include('php/headuser.php');?>
</header>
 <section class="nav">
    <button class="btn_nav1" onclick="atras()">Atras</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>    

</section>
<section>
    <div id="lowrbdy">

	  <div class="big-outer">

        <form method="POST" action="Carrito.php">
            <input type="hidden" name="idprod" id="idprod" value="<?=$ID?>">
            <div id="detpro">
                
                    <div class=img_pro>
                    
                        <a href="img/<?php echo $row['pro_img']?>"><img src="img/<?=$row['pro_img']?>"></a>
                    </div>
                    <div class=detalle>
                    <div class="Nombre"><p><?=$row['vchMarca']." ".$row['vchNombre']?></p></div>
                    <div class="Descripcion"><p><?=$row['vchDescripcion']?> </p></div>
                    <div class="Precio"><p><span class="icon-coin-dollar "></span><?=$row['fltPrecio']?></p><div>
                    
                    

                </div>
    </div>
</form>
</div>
</div>
</section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
   <?php include'php/footer.php';?>

</body>
</html>