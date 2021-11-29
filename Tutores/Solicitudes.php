<?php 
    session_start();
?>
<?php
require "conexionT.php";

$_docente=$_SESSION['control'];

$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT id_docente, nombre_docente, apellido_p, apellido_m FROM docentes;";

$sql3 = "SELECT a.nombreA,a.apellido_p,a.apellido_m,a.numero_control,a.correo
          FROM alumnos a
          JOIN asignar_tutor ast on(ast.fk_alumno = a.id_alumnos)
          WHERE ast.fk_docentes=5";




$sql2 = "SELECT D.id_docente, ATR.pk_solicitudes,A.nombreA, A.apellido_p,A.apellido_m, ATR.status,ATR.fecha,ATR.motivo 
          FROM alumnos A INNER JOIN solicitudes ATR ON (ATR.fk_alumnos =A.id_alumnos) 
            INNER JOIN docentes D ON(D.id_docente = ATR.fk_docentes) WHERE D.usuario = '".$_docente."';";

$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);


$error=mysqli_error($conexion);
echo"Error: $error ";
?>


<!DOCTYPE html>
<html lang="estilo">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
                <li class="nav-item"><a href="Solicitudes.php" class="nav-link">SOLICITUDES</a></li>
                <li class="nav-item"><a href="Reporte.php" class="nav-link">GENERAR REPORTE</a></li>
                <li class="nav-item"><a href="GestionarDatosT.html" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a>
                </li>
                <li class="nav-item"><a href="loginT.php" class="nav-link">CERRAR SESIÓN</a></li>
            </ul>
        </div>
        <a href="../index.html"><img src="../Imagenes/Incio/Icono4.png" alt="Icono2" width="250"></a>
    </header>

    <main class="mainLogin">
        <h2 class="titulo">Solicitudes de canalización de estudiantes</h2>

        <table>
            <tr>
                <td style="border: 1px solid #000; padding: 10px;">No.</td>
                <td style="border: 1px solid #000; padding: 10px;">Nombre</td>
                <td style="border: 1px solid #000; padding: 10px;">Apellido Paterno</td>
                <td style="border: 1px solid #000; padding: 10px;">Apellido Materno</td>
                <td style="border: 1px solid #000;">Status</td>
                <td style="border: 1px solid #000;">Fecha</td>
                <td style="border: 1px solid #000;">Observación y/o Motivo</td>
            </tr>

            <?php while($datos=$resultado2->fetch_array()){?>
            <tr>
                <td><?php echo $datos["pk_solicitudes"]?></td>
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["status"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["motivo"]?></td>
            </tr>
            <?php } ?>

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