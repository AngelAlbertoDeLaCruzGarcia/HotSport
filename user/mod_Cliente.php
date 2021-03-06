<?php
include '../php/conexion.php';
session_start();

$usuario = $_SESSION["user"];
if (isset($usuario)) {

  $user = "SELECT * FROM tbluser WHERE vchUser='$usuario'";
  $res = mysqli_query($conexion, $user);

  if (mysqli_num_rows($res) > 0) {
    $fila = mysqli_fetch_assoc($res);
    $user = $fila['vchUser'];
    $contra = $fila['vchPassword'];
    $clienter = $fila['intIdcliente'];
  }
  $sql = "SELECT * FROM tblcliente WHERE intIdcliente=$clienter";
  $resultado = mysqli_query($conexion, $sql);
  if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $id = $row['intIdcliente'];
    $nombre = $row['vchNombre'];
    $ap = $row['vchApaterno'];
    $am = $row['vchAmaterno'];
    $cel = $row['vchCelular'];
    $est = $row['vchEstado'];
    $ciu = $row['vchCiudad'];
    $col = $row['vchColonia'];
    $cal = $row['vchCalle'];
    $email = $row['vchEmail'];
  }


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modificar cliente</title>
    <link rel="stylesheet" href="../css/style_index.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
    <script type="text/javascript" src="../validaciones/validarClie.js"></script>
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
      <?php include 'php/headuser.php'; ?>
    </header><br><br><br>
    <button class="btn_nav1" onclick="atras()">Atrás</button>
    <button class="btn_nav" onclick="adelante()">Adelante</button>

    <section class="main">
      <form action="../php/actualizar_cliente2.php" class="form_user" method="post" onsubmit="return validaciones(this);">
        <h2 class="form-titulo">Editar Cliente </h2>
        <div class="conten-inputs">
          <input type="hidden" id="idclient" name="idclient" value="<?= $id ?>">
          Nombre:
          <input type="text" id="Nombre" name="nombre" value="<?= $nombre ?>" placeholder="Nombre(s)" class="input-100" maxlength="80">
          Apellido paterno:
          <input type="text" id="Apaterno" name="Ap" value="<?= $ap ?>" placeholder="Apellido Paterno" class="input-100" maxlength="80">
          Apellido materno:
          <input type="text" id="Amaterno" name="Am" value="<?= $am ?>" placeholder="Apellido Materno" class="input-100" maxlength="80">
          Celular:<p>
            <input type="text" id="Tel" name="Cel" value="<?= $cel ?>" placeholder="Celular" class="input-48" maxlength="10">

            <select id="Estado" name="estado" class="input-48">
              <option value="<?= $est ?>"><?= $est ?></option>
              <option>Aguascalientes</option>
              <option>Hidalgo</option>
              <option>Mexico</option>
              <option>Sonora</option>
              <option>Tamaulipas</option>
              <option>Veracruz</option>
            </select>

            Email:
            <input type="email" id="Email" name="Correo" value="<?= $email ?>" placeholder="Email" maxlength="30" class="input-100">
          </p>
          Ciudad:
          <input type="text" id="Ciudad" name="Ciudad" value="<?= $ciu ?>" placeholder="Ciudad" maxlength="20" class="input-100">
          Colonia:
          <input type="text" id="Colonia" name="Colonia" value="<?= $col ?>" placeholder="Colonia" maxlength="20" class="input-100">
          Calle:_
          <input type="text" id="Calle" name="Calle" value="<?= $cal ?>" placeholder="Calle" maxlength="30" class="input-100">
          Usuario:
          <input type="text" id="Usuario" name="usuario" readonly value="<?= $user ?>" placeholder="Colonia" maxlength="20" class="input-100">
          Contraseña:
          <input type="password" id="Passw" name="password" value="<?= $contra ?>" placeholder="Calle" maxlength="30" class="input-100">

          <input type="submit" value="Actualizar" class="btn_enviar">
          <input type="reset" value="Borrar" class="btn_borrar">
        </div>
      </form>
    </section>
    <?php include 'php/footer.php'; ?>
  </body>

  </html>
<?php
} else {
  echo '<script> window.location="../login.php"; </script>';
}
?>