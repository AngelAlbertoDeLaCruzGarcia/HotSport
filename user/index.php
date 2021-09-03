<?php include 'php/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">


    <link rel="stylesheet" type="text/css" href="./css/style1.css" />


    <script type="text/javascript" src="./js/jquery.js">
    </script>
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
    </header><br><br><br><br>
    <section class="main">
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    <li>
                        <img src="./img/slider/thumb.jpg" alt="slider1" title="" id="wows1_0" name="wows1_0" />
                    </li>

                    <li>
                        <img src="./img/slider/zapatos-de-futbol-adidas-messi-161-profesional-s79624-D_NQ_NP_769540-MLM31228245095_062019-Q.jpg" alt="slider2" title="" id="wows1_1" name="wows1_1" />
                    </li>

                </ul>
            </div>
        </div>
        <script type="text/javascript" src="./js/wowslider.js">
        </script>
        <script type="text/javascript" src="./js/script.js"></script>

    </section>
    <section class="cat">
        <center>
            <h2><strong>Categorias</strong></h2>
        </center>
        <br>
        <br>
        <section class="leftt">
            <a href="list_Inf.php">
                <img src="../img/niños2.jpg" ; width="216" height="180">
                <br>
                <strong><strong>Niños</strong></a>
            <p></p>
        </section>
        <section class="lefttt">
            <a href="list_Cab.php">
                <img src="../img/hombres.jpg" ; width="216" height="180">
                <br>
                <strong><strong>Caballeros</strong></a>
            <p></p>
        </section>
        <section class="rightt">
            <a href="list_Dama.php">
                <img src="../img/mujer1.jpg" ; width="216" height="180">
                <br>
                <strong>Dama</strong></a>
            <p></p>
        </section>
        <section class="righttt">
            <a href="list_Acc.php">
                <img src="../img/otros/f12989512.jpg" ; width="216" height="180">
                <br>
                <strong>Accesorios</strong></a>
            <p></p>
        </section>

    </section>
    <?php include 'php/footer.php'; ?>

</body>

</html>