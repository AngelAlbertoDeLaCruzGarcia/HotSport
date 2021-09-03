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
    if (isset($usuario))
      include 'php/headuser.php';
    else
      include 'php/head.php';
    ?>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml: true,
          version: 'v3.3'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="786651991731794" theme_color="#0084ff" logged_in_greeting="¿Como podemos ayudarte?" logged_out_greeting="¿Como podemos ayudarte?">
    </div>

  </header><br><br><br><br>
  <button class="btn_nav1" onclick="atras()">Atrás</button>
  <button class="btn_nav" onclick="adelante()">Adelante</button>

  <section class="main">
    <center>
      <span class="icon-facebook2"> www.facebook.com</span><br><br>
      <span class="icon-whatsapp"> 7716838276 </span><span class="icon-phone"></span><br><br>
      <span class="icon-twitter"> www.twitter.com</span><br><br>
      <span class="icon-google"> angel.barsa1999@gmail.com</span><br><br>

    </center>
  </section>
  <?php include 'php/footer.php'; ?>



</body>

</html>