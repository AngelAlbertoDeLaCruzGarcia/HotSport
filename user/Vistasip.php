<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../css/list_form2.css">
    <link rel="stylesheet" href="../font/style.css">
    <script>
        function atras() {
            history.back();
        }

        //forward: cargar la url siguiente en el historial
        function adelante() {
            history.forward();
        }
    </script>

</head>

<body>
    <header>
        <?php
        session_start();
        $usuario = $_SESSION['user'];
        if (isset($usuario) && !empty($usuario))
            include 'php/headuser.php';
        else {
            $_SESSION['user'] = null;
            include 'php/head.php';
        }
        ?>
    </header><br><br><br>
    <button class="btn_nav1" onclick="atras()">Atrás</button>
    <button class="btn_nav" onclick="adelante()">Adelante</button>


    <font color="white" class="form-titulo">
        <h1>Sandalias infantiles</h1>
    </font>


    <form action="buscar_prod.php" method="GET" class="form_buscar">
        <input type="text" name="buscar" id="buscar" placeholder="Nombre,Marca,Categoria">
        <input type="submit" name="btn_enviar" class="btn_buscar" value="Buscar">
    </form>
    <br><br><br><br><br><br><br>
    <center>
        <div id="productos">
            <?php
            include('../php/conexion.php');
            $registro = mysqli_query($conexion, "SELECT COUNT(*) as registrot FROM vistaprod WHERE 
                        vchDescripcion LIKE '%Sandalia%' AND vchTipop IN ('Infantiles'); ");
            $res = mysqli_fetch_array($registro);
            $total = $res['registrot'];
            $por_pagina = 8;
            if (empty($_GET['pagina'])) {
                $pagina = 1;
            } else {
                $pagina = $_GET['pagina'];
            }
            $desde = ($pagina - 1) * $por_pagina;
            $total_paginas = ceil($total / $por_pagina);
            $query = mysqli_query($conexion, "CALL splistarsip($desde,$por_pagina);");

            $row = mysqli_num_rows($query);
            if ($row > 0) {

                while ($fila = mysqli_fetch_assoc($query)) { ?>
                    <a href="Vistadp.php?tblproductos=<?= $fila["intIdproducto"] ?>">
                        <div class="producto">
                            <div class="imagenpro"><img src="img/<?= $fila["pro_img"] ?>" /></div>
                            <div class="nombre"><?= $fila["vchMarca"] . " " . $fila["vchNombre"] ?></div>
                            <p class="precio">$<?= $fila["fltPrecio"] ?></p></br>
                            <div class="btnc"><input type="button" value="Comprar" class="btn"></div>
                        </div>
                    </a>
            <?php }
            } ?>

        </div>


    </center>

    </section><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center>

        <div class="paginador">

            <?php
            if ($pagina != 1) {
            ?>
                <a href="?pagina=<?php echo 1; ?>">|< Primero </a>
                        <a href="?pagina=<?php echo $pagina - 1; ?>">
                            << Anterior</a>
                            <?php
                        }
                        for ($i = 1; $i <= $total_paginas; $i++) {
                            if ($i == $pagina) {
                                echo $i;
                            } else {
                                echo '<a href="?pagina=' . $i . '">' . $i . '</a>' . " ";
                            }
                        }
                        if ($pagina != $total_paginas) {
                            ?>
                                <a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente>></a>
                                <a href="?pagina=<?php echo $total_paginas; ?>">Ultimo>|</a>
                            <?php } ?>

        </div>
    </center>
    <?php include 'php/footer.php'; ?>
</body>

</html>