<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{ 
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT S.pk_solicitudes ,A.nombreA, A.apellido_p, A.numero_control, C.siglas, G.nombre_grupo, AR.nombre, S.fecha, AR.fecha, AR.tipo_de_asesoria, S.status FROM alumnos A  
        INNER JOIN  carreras C ON(C.id_carreras = A.fk_carreras) 
        INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) 
        INNER JOIN solicitudes S ON(S.fk_alumnos= A.id_alumnos) 
        INNER JOIN asesorias AR ON(AR.id_asesorias= S.fk_asesorias) WHERE S.status = 'Solicitada';";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
            <li class="nav-item"><a href="GestionarAsignacion.php" class="nav-link">ASIGNAR TUTORES</a></li>
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
    <div class = "buton"><button onclick="location.href='Solicitudes.php'">SOLICITADAS</button></div>
    <div class = "buton"><button onclick="location.href='Solicitudes1.php'">ACEPTADAS</button></div>
    <div class = "buton"><button style=" width: 200px;padding-left: 10px; padding-right: 10px;" onclick="location.href='Solicitudes2.php'">RETROALIMENTACION</button></div>
    </div>

  <br>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>Nombre Alumno</td>
        <td>Apellido Paterno</td>
        <td>Numero Control</td>
        <td>Carrera</td>
        <td>Grupo</td>
        <td>Asesoria</td>
        <td>Fecha Solicitada</td>
        <td>Fecha Asesoria</td>
        <td>Tipo de Asesoria</td>
        <td>Status</td>

    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["siglas"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["fecha"]?></td>
                <td><?php echo $datos["tipo_de_asesoria"]?></td>
                <td><?php echo $datos["status"]?></td>
                <td> 
                <?php 
  
               // <?php echo"<td><input type='submit' href = 'status.php?id=".$datos["pk_solicitudes"]."' name ='btnAceptar' value='Aceptar'></td>";?>
                 
                
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