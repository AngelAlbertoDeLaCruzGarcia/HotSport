<?php
    require('../php/conexion.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="css/carrito.css" type="text/css">
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
		<nav class="navegacion">
			<ul class="menu">
            <a href="Carrito.php"><div class="cart">
                
                <p class="cart-e"><span class=" icon-cart"></span></p>
                <p class="cart-f">
                    <?php
                        if(isset($_SESSION["cartshop"])){
                            $s=count($_SESSION["cartshop"]);
                        }
                        else{
                            $s=0;
                            }
                        echo $s;
                    ?>
                </p>
		        </div></a>

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
        
    </header><br><br><br><br><br>

<?php
$t=$_POST['Cant'];

if (isset($_POST['idprod'])) {
    $id = $_POST['idprod'];
	$wasFound = false;
	$i = 0;
	if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) { 
		$_SESSION["cartshop"] = array(0 => array("item_id" => $id, "quantity" => 1));
	} else {
		foreach ($_SESSION["cartshop"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $id) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $id, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  }
		      }
	       }
		   if ($wasFound == false) {
			   array_push($_SESSION["cartshop"], array("item_id" => $id, "quantity" => 1));
		   }
	}
	header("location: Carrito.php"); 
    exit();
}
?>
<?php
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cartshop"]);
}
?>
<?php
///Es para el boton de actualizar
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity);
	if ($quantity >= 20) { $quantity = 19; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cartshop"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  array_splice($_SESSION["cartshop"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  }
		      }
	}
}
?>
<?php
///Es para eliminar un producto del carrito
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cartshop"]) <= 1) {
		unset($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	} else {
		unset($_SESSION["cartshop"]["$key_to_remove"]);
		sort($_SESSION["cartshop"]);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}
?>
	<div id="fondo"><b><br><br><br>
	<section class="nav">
    <button class="btn_nav1" onclick="atras()">Atras</button>
		<button class="btn_nav" onclick="adelante()">Adelante</button>    

</section>

    <div id="lowrbdy">

	  <div class="big-outer">

   		<br>
        <table width="100%" border="0" style="border-collapse:collapse">
<?php
///Imprime los resultados de la cabezera en caso de que haya un producto en el carrito
if(isset($_SESSION['cartshop'])==!NULL){
?>
  <tbody>
    <tr class="upper-details">
      <td height="36" colspan="2" style="border-right: 0px solid #000;">Producto</td>
      <td width="16%" style="border-right: 0px solid #000;">Unidades</td>
      <td width="16%" style="border-right: 0px solid #000;">Precio unitario</td>
      <td width="21%">Subtotal</td>
    </tr>
<?php
}
?>
<?php 
///Si esta vacio imprime mensaje de lo cotraio muestra los productos
$cartTotal = "";
if (!isset($_SESSION["cartshop"]) || count($_SESSION["cartshop"]) < 1) {
    echo '<div class="empty-cart"><h2 class="crta">El carrito esta vacio</h2>';
	echo '<br><a href="Vistap.php"><h2 class="alink">Continuar comprando</h2></a></div>';
} else {
$i = 0; 
    foreach ($_SESSION["cartshop"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$consulta ="SELECT * FROM tblproductos WHERE intIdproducto='$item_id' LIMIT 1";
		$sql=$conexion->query($consulta);
		while ($row = mysqli_fetch_assoc($sql)) {
            $marca = $row["vchMarca"];
			$productname = $row["vchNombre"];
			$producttotalprice = $row["fltPrecio"];
			$productcode = $row["intIdproducto"];
			$fotos=$row['pro_img'];
			
			$pr=$row['fltPrecio'];
			
		}
		
		$producttotalpricetotal = $producttotalprice * $each_item['quantity'];
		$cartTotal = $producttotalpricetotal + $cartTotal;
echo'<tr>
      <td width="7%" rowspan="3" style="border-bottom: 0px solid #000; height:100px"><img src="img/'.$fotos.'"/></td>
      <td width="29%" height="5" style="border-right: 0px solid #000; height:20px">&nbsp;</td>
      <td rowspan="2" style="border-right: 0px solid #000;">
		  <form action="Carrito.php" method="post">
		  	<input name="quantity" id="quantity" type="number" value="' . $each_item['quantity'] . '"  min="1" max="100" class="qnttxt"/></br>
			<input id="adjustBtn" name="adjustBtn' . $item_id . '" type="submit" value="Actualizar" class="qntbtn"/>
			<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		  </form>
	  </td>
      <td style="border-right: 0px solid #000;">&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr style="border-bottom: 0px solid #000;">
      <td style="border-right: 0px solid #000;">'.$marca.$t." ".$productname.'</td>
      <td style="border-right: 0px solid #000;">$'.number_format($producttotalprice).'</td>
      <td><p style="float:left;margin:0px 0px 0px 110px;font-size:20px;text-decoration:none">$'.number_format($producttotalprice*$each_item['quantity']).'</p>
	  	<form action="Carrito.php" method="post">
			<input name="deleteBtn' . $item_id . '" type="submit" value="X" class="removebtn"/>
			<input name="index_to_remove" type="hidden" value="' . $i . '" />
        </form>
	  </td>
    </tr>
    <tr>';
	$i++;
	}
echo'<div style="width:400px; height:40px; background:rgba(100,190,255,1.00); margin:auto; margin-bottom:6px;margin-top:10px">
<p style="font-size:20px;text-align:center; color:#fff; line-height:2em">Monto total de compra: <strong>$ '.number_format($cartTotal).'</strong></p></div>
<a href="clear-session.php"><div style="width:55%; height:22px;"><p id="emptycart">( Empty Cart )</p></div></a>
';
}
?>
  </tbody>
</table>
        </div>
	</div>
</div>
</body>
</html>