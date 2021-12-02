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




$sql2 = "SELECT D.id_docente, ATR.pk_solicitudes,A.nombreA, A.apellido_p,A.apellido_m, ATR.status,ATR.fecha,ATR.motivo,m.mensaje
          FROM alumnos A INNER JOIN solicitudes ATR ON (ATR.fk_alumnos =A.id_alumnos) 
           INNER JOIN docentes D ON(D.id_docente = ATR.fk_docentes)
           LEFT JOIN mensaje m ON (m.fk_docente=D.id_docente) WHERE D.usuario = '".$_docente."';";



$id_docente = $conexion->query("SELECT id_docente from docentes where usuario = '".$_SESSION['control']."'");
                    


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
                <td style="border: 1px solid #000;">Respuesta</td>
            </tr>

            <?php while($datos=$resultado2->fetch_array()){?>
            <tr>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["pk_solicitudes"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["nombreA"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["apellido_p"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["apellido_m"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["status"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["fecha"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["motivo"]?></td>
                <td style="border: 1px solid #000; padding: 10px;"><?php echo $datos["mensaje"]?></td>

            </tr>
            <?php } ?>

        </table>


        <h1 align="center">Responder Solicitud</h1>
        <form action="" method='post' align="center">
            <?php
                if (isset($_POST['btnSolicitar'])){
                    include 'conexionT.php';

                    $id_docente = $conexion->query("SELECT id_docente from docentes where usuario = '".$_SESSION['control']."'");
                    echo"id_docente";

                    $fecha_actual = date('Y-m-d');
                    
                    $motivo = $conexion->real_escape_string($_POST['motivo']);
                    $asesoriaE =  $conexion->real_escape_string($_POST['alumnos']);
                    $id_alumno = $conexion->query("SELECT id_alumnos from alumnos where numero_control = '".$_SESSION['control']."'");
                    $rowAl = $id_alumno->fetch_array();
                    $id_asesoria = $conexion->query("SELECT id_asesorias from asesorias where nombre = '$asesoriaE'");
                    $rowAs = $id_asesoria->fetch_array();
                    $idal = $rowAl['id_alumnos'];
                    $idas = $rowAs['id_asesorias'];
                    
                    $fk_docent = $conexion->query("SELECT fk_docentes from asignar_tutor where fk_alumno = '$idal'");
                    $rowAx = $fk_docent->fetch_array();
                    if (isset($rowAx['fk_docentes'])){
                    $idax = $rowAx['fk_docentes'];
                    } else { return 'No se te ha asignado un tutor';}
                        $insercion = $conexion->query("INSERT into mensaje (mensaje,fecha,fk_alumno,fk_docente) Values ('Solicitada', '$fecha_actual', '$motivo', '$idal', $idax,'$idas')");
                            if ($insercion) {echo "Se ha hecho la solicitud";}
                                else {
                                    echo "No se ha podido responder la solicitud";
                                }
                }
            ?>
            
            <?php
                include 'conexionT.php';
                $consulta = "SELECT A.nombreA,A.id_alumnos
                FROM alumnos A INNER JOIN solicitudes ATR ON (ATR.fk_alumnos =A.id_alumnos) 
                  INNER JOIN docentes D ON(D.id_docente = ATR.fk_docentes) WHERE D.usuario = '".$_docente."';";

                $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
                echo "<select required name='alumnos'>";
                while ($columna = mysqli_fetch_array( $resultado ))
                {
                    
                    echo "<option value='". $columna['nombreA']."'>";
                    echo $columna['nombreA'];
                    echo "</option>";      
                }
                echo "<select>";
                mysqli_close( $conexion );
            ?>
            <br></br>

            <textarea name="mensaje" rows="2" cols="50" placeholder="Responde la solicitud." require></textarea>

            <br></br>
            <div class="buton">
                <button onclick="location.href='Alumno.php?numero=16401013&tipo=asesoria'"
                    name="btnSolicitar">SOLICITAR</button>

            </div>
        </form>


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



<?php while($datos=$id_docente->fetch_array()){?>
    <?php echo $datos["id_docente"]?>
<?php } ?>


</body>

</html>