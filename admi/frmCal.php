<?php
session_start();
include '../php/conexion.php';

if(isset($_SESSION['user'])) {?>
<?php
require('../php/conexion.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de Calificaiones</title>
	<link rel="stylesheet" href="../css/style_index.css">
	<link rel="stylesheet" href="../css/style_login.css">
    <link rel="stylesheet" href="../font/style.css">
    <link rel="stylesheet" href="../css/formularios.css">
</head>
<body>
<header>
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="index.php"><span class="icon-home"></span> Inicio</a></li>
                <li><a href="#"><span class="icon-users"></span> Alumnos</a>
                    <ul class="submenu">
                            <li><a href="frmMaterias.php">Agregar de Materias</a></li>
                            <li><a href="frmAlumnos.php">Agregar Alumnos</a></li>
                            <li><a href="list_materias.php">Lista Materias</a></li>
                            <li><a href="list_alumn.php">Lista de alumnos</a></li>
                        </ul>
					</li>

					<li><a href="#"><span class=" icon-profile"></span> Maestros</a>
					<ul class="submenu">
						<li><a href="frmProfesor.php">Agregar Maestros</a></li>
						<li><a href="list_profesor.php">Lista de Maestros</a></li>

					</ul>
				</li>
				<li><a href="#"><span class=" icon-briefcase"></span> Servicios</a>
					<ul class="submenu">
						<li><a href="frmBecas.php">Agregar Becas</a></li>
						<li><a href="list_becas.php">Lista de Becas</a></li>

					</ul>
				</li>
				<li><a href=""><span class="icon-file-text"></span> Calificaciones</a>
					<ul class="submenu">
                            <li><a href="frmCal.php">Agregar calificaciones</a></li>
                           <li><a href="list_calif.php">Lista de calificaciones</a></li>
                        </ul>
				</li>
				<li><a href=""><span class="icon-pen"></span> Grado</a>
					<ul class="submenu">
                            <li><a href="frmGrado.php">Agregar Grado</a></li>
                           <li><a href="list_grado.php">Lista de Grado</a></li>
                        </ul>
				</li>
        <li><a href=""><span class=" icon-address-book"></span>Usuarios</a>
          <ul class="submenu">
                            <li><a href="frmUser.php">Agregar Usuario</a></li>
                           <li><a href="list_user.php">Lista de Usuarios</a></li>
                        </ul>
        </li>
  <li><a href="../php/destruir_sesion.php"><span class="icon-switch" politicas="Salir" ></span> </a></li>
			</ul>
		</nav>
    </header><br><br><br><br><br><br>
    <section class="main">

                <form action="../php/save_calif.php" class="form_becas" method="post">
                        <h2 class="form-titulo">Registro de Calificaciones </h2>
                        <div class="conten-inputs">
                            <p>
                              <input type="number"  name="bimestre1" placeholder="Bimestre 1" class="input-48" required>
                              <input type="number"  name="bimestre2" placeholder="Bimestre 2" class="input-48" required>
                              <input type="number"  name="bimestre3" placeholder="Bimestre 3" class="input-48" required>
                              <input type="number"  name="bimestre4" placeholder="Bimestre 4" class="input-48" required>
                              <input type="number"  name="bimestre5" placeholder="Bimestre 5" class="input-48" required>

                              <select name="txt_matriProf" id="" class="input-48">
                                <option value="0">Seleccione un maestro</option>
                                <?php
                                            $prof="SELECT * FROM tblprofesor";
                                            $resprof=mysqli_query($conexion,$prof);
                                             while ($fila=mysqli_fetch_assoc($resprof)) {
                                                        ?>

                                <option value="<?php echo $fila['vchMatricula']?>"><?php echo $fila['vchNombre'];?></option>
                                <?php
										}
									?>
                              </select>

                               <select name="txt_matriAlumno" id="" class="input-48">
                                 <option value="0">Seleccione una alumno</option>
                                 <?php
                                            $alumno="SELECT * FROM tblalumnos";
                                            $resalumno=mysqli_query($conexion,$alumno);
                                             while ($fila=mysqli_fetch_assoc($resalumno)) {
                                                        ?>

                                 <option value="<?php echo $fila['vchMatricula']?>"><?php echo $fila['vchNombre'];?></option>
                                 <?php
										}
									?>
                               </select>

                               <select name="txt_materia" id="" class="input-48">
                                 <option value="0">Seleccione una materia</option>
                                 <?php
                                            $materias="SELECT * FROM tblmaterias";
                                            $resmaterias=mysqli_query($conexion,$materias);
                                             while ($fila=mysqli_fetch_assoc($resmaterias)) {
                                                        ?>

                                 <option value="<?php echo $fila['intId_materia']?>"><?php echo $fila['vchNombre_Materia'];?></option>
                                 <?php
										}
									?>
                               </select>
                            </p>
                            <p><br></p>

                                <input type="submit" value="Agregar" class="btn_enviar">
                                <input type="reset" value="Borrar" class="btn_borrar">

                        </div>
                </form>

        </div>

    </section>
        <footer>
				<div class="footerForm">
					<center>
						<h2> Footer</h2>
					</center>

				</div>
				<div class="container-footer">
					<div class="footer1">
							<div class="copyright">
								<p class="derechos">©2018 Todos los Derechos Reservados</p>|<a href=""class="footerEscuela">Escuela</a>
							</div>

							<div class="information">
								<a href="">Objetivo</a> || <a href="">Mision y Vision</a> || <a href="">Privacion de politicas</a> || <a href="">Terminos y Condiciones</a>
							</div>
					</div>
				</div>
        </footer>
</body>
</html>
<?php
}else{
	echo '<script> window.location="../login.php"; </script>';
}
?>
