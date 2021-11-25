<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT S.pk_solicitudes, D.nombre_docente, A.nombreA, AR.nombre, AR.fecha, AR.tipo_de_asesoria, S.fecha, S.status FROM docentes D INNER JOIN solicitudes S ON(S.fk_docentes = D.id_docente) INNER JOIN alumnos A ON(A.id_alumnos = S.fk_alumnos) INNER JOIN asesorias AR ON(AR.id_asesorias = S.fk_asesorias);";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloDe.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="Solicitudes.php" class="nav-link">SOLICITUDES</a></li>
            <li class="nav-item"><a href="gestionarAlumnos.php" class="nav-link">GESTIONAR TUTORADOS</a></li>
            <li class="nav-item"><a href="AsignarTutores.php" class="nav-link">ASIGNAR TUTORES</a></li>
            <li class="nav-item"><a href="gestionarGruposCarreras.html" class="nav-link">GRUPOS/CARRERAS</a></li>
            <li class="nav-item"><a href="gestionarAsesorias.php" class="nav-link">GESTIONAR ASESORIAS</a></li>
            <li class="nav-item"><a href="GestionarReportes.php" class="nav-link">REPORTES</a></li>
            <li class="nav-item"><a href="GestionarDatosC.html" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
        
            
            <li class="nav-item"><a href="loginC.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <h2 class ="titulo">Solicitudes</h2>
      
    <div class = "botones_consulta">
    <div class = "buton"><button onclick="location.href='Solicitudes.php'">SOLICITUDES ALUMNOS</button></div>
    <div class = "buton"><button onclick="location.href='Solicitudes1.php'">SOLICITUDES TUTORES</button></div>
    <div class = "buton"><button onclick="location.href='Solicitudes2.php'">TUTORES A TUTORADOS</button></div>
    </div>
    <br>
    <h3 align="center">Docentes a alumnos</h3>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>Nombre Docente</td>
        <td>Nombre Alumno</td>
        <td>Asesoria</td>
        <td>Fecha Solicitada</td>
        <td>Tipo de Asesoria</td>
        <td>Fecha Asesoria</td>
        <td>Status</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["tipo_de_asesoria"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["status"]?></td>
                <td> 
                <?php echo"<td><a href='status.php?id=".$datos["pk_solicitudes"]."'>Aceptar</a></td>";?>
                <?php echo"<td><a href='status1.php?id=".$datos["pk_solicitudes"]."'>Negar</a></td>";?>
                </td>
            </tr>
            <?php   
        }

     ?>
    </table>

    </main>
 


    <footer>

    </footer>


    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>