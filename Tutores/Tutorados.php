<?php
require "conexionT.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT id_docente, nombre_docente, apellido_p, apellido_m FROM docentes;";
$sql2 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, 
                A.nombreA, A.apellido_p, A.numero_control, 
                G.nombre_grupo,
                C.siglas  
                FROM docentes D 
                INNER JOIN asignar_tutor AST ON(AST.fk_docentes=D.id_docente) 
                INNER JOIN alumnos A ON(A.id_alumnos = AST.fk_alumno) 
                INNER JOIN grupos G ON(G.id_grupo= A.fk_grupo) 
                INNER JOIN carreras C ON(C.id_carreras= A.fk_carreras);";
$sql3 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m 
            FROM docentes D 
            LEFT JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente) 
            WHERE AST.fk_docentes IS NULL;";
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
$resultado3 = $conexion->query($sql3);
?>


<!DOCTYPE html>
<html lang="estilo">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorados</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="../css/estiloT.css">
</head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse end-justify" id="navbar">
      <ul class="navbar-nav">
        <!-- <li class="nav-item"><a href="Tutor.html" class="nav-link">TUTORIAS</a></li>-->
        <li class="nav-item"><a href="Tutorados.php" class="nav-link">TUTORADOS</a></li>
        <!--  <li class="nav-item"><a href="Canalizacion.html" class="nav-link">CANALIZACION</a></li>-->
        <li class="nav-item"><a href="#" class="nav-link">SOLICITUDES</a></li>
        <li class="nav-item"><a href="Reporte.php" class="nav-link">GENERAR REPORTE</a></li>
        <li class="nav-item"><a href="GestionarDatosT.html" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
        <li class="nav-item"><a href="loginT.php" class="nav-link">CERRAR SESIÓN</a></li>
      </ul>
    </div>
    <a href="../index.html"><img src="../Imagenes/Incio/Icono4.png" alt="Icono2" width="250"></a>
  </header>

  <main class="mainLogin">
    <h2 class="titulo">Listado de tutorados</h2>

    <table>
      <tr>
        <td style="border: 1px solid #000; padding: 10px;">Nombre</td>
        <td style="border: 1px solid #000;">Número de control</td>
        <td style="border: 1px solid #000;">Correo</td>
        <td style="border: 1px solid #000;">Crédito liberado</td>
        <td style="border: 1px solid #000;">Encuesta Inicial</td>
        <td style="border: 1px solid #000;">Ficha de Identificación</td>
        <td style="border: 1px solid #000;">Seguro Social</td>
      </tr>

      <tr>

      </tr>

    </table>

  </main>



  <footer>
    <div class=footerDatos>
      <h4>Instituto Tecnologico de Tepic</h4>
      <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>
      <p>(311) 211 9400</p>
      <p>Tepic, Nayarit. Mexico</p>
    </div>
  </footer>


  <img class="logo5" src="../Imagenes/Incio/Icono5.png" alt="Icono5" width="200">






</body>

</html>