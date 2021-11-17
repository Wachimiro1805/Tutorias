<?php
require "conexionCT.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT S.pk_solicitudes, D.nombre_docente, D.apellido_p, C.siglas, G.nombre_grupo, AR.nombre, AR.fecha, AR.tipo_de_asesoria, S.fecha, S.status  FROM docentes D INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras) INNER JOIN grupos G ON(G.id_grupo = D.fk_grupo) INNER JOIN solicitudes S ON(S.fk_docentes = D.id_docente) INNER JOIN asesorias AR ON(AR.id_asesorias = S.fk_asesorias);";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
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
            <li class="nav-item"><a href="Departamento.php" class="nav-link">SOLICITUDES</a></li>
            <li class="nav-item"><a href="GestionarUsuarios.html" class="nav-link">TUTORES/COORDINADORES</a></li>
            <li class="nav-item"><a href="#" class="nav-link">VER EXPEDIENTES ALUMNOS</a></li>
            <li class="nav-item"><a href="GestionarDatosJD.html" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
            <li class="nav-item"><a href="loginD.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <h2 class ="titulo">Solicitudes</h2>
      
    <div class = "botones_consulta">
    <div class = "buton"><button onclick="location.href='Departamento.php'">SOLICITUDES ALUMNOS</button></div>
    <div class = "buton"><button onclick="location.href='Departamento1.php'">SOLICITUDES TUTORES</button></div>
    <div class = "buton"><button onclick="location.href='Departamento2.php'">TUTORES A TUTORADOS</button></div>
    </div>
    <br>
    <h3 align="center">Docentes</h3>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>Nombre Docente</td>
        <td>Apellido Paterno</td>
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
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["siglas"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
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