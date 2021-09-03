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
    <title>Listado de imagenes</title>
    
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

</section><br><br><br>

    <section class="" >

        <center> <font color = "white"><h1>Downloads</h1></font>
        </center>

        <center>
              <div class="tam">
                    <table >
                        <thead >

                            <td >Imagenes</td>
                        </thead>
          <?php
            $file=scandir("../user/img/");
            for($a=2; $a<count($file);$a++){

        ?>
    
    <tr>
        <td><a href="../user/img/<?php echo $file[$a];?>" > 
        <?php echo $file[$a];?></td></a>
    </tr>
    <?php } ?>
        </center>

    </section>
</table>
</div><br><br><br><br><br><br><br><br>
<?php include '../php/footer.php';?>
</body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>
