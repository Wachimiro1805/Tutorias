<?php
require "conexionC.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT A.nombre, A.apellido_p, A.apellido_m, A.numero_control, G.nombre_grupo, C.siglas FROM alumnos A INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) INNER JOIN carreras C ON(C.id_carreras = A.fk_carreras);";
$sql2 = "SELECT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas FROM docentes D INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras);";
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
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
  <link rel="stylesheet" href="../css/estiloC.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse end-justify" id="navbar">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="gestionarAlumnos.php" class="nav-link">GESTIONAR TUTORADOS</a></li>
            <li class="nav-item"><a href="AsignarTutores.php" class="nav-link">ASIGNAR TUTORES</a></li>
            <li class="nav-item"><a href="gestionarGruposCarreras.html" class="nav-link">GRUPOS/CARRERAS</a></li>
            <li class="nav-item"><a href="gestionarAsesorias.php" class="nav-link">GESTIONAR ASESORIAS</a></li>
            <li class="nav-item"><a href="#" class="nav-link">REPORTE TUTORES</a></li>
            <li class="nav-item"><a href="CambiarDatos.php" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
        
            
            <li class="nav-item"><a href="loginC.html" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 

  <main>
  <h1 align="center">Alumnos</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Numero de control</td>
        <td>Grupo</td>
        <td>Carrera</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr>
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>

    <h1 align="center">Docentes</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Carrera</td>
    </tr>
    <?php 
        while($datos=$resultado2->fetch_array()){
        ?>
            <tr>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>
             
  </main>



  <footer>
      <div class = footerDatos>     
      <h4>Instituto Tecnologico de Tepic</h4>
      <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>  
      <p>(311) 211 9400</p>
      <p>Tepic, Nayarit. Mexico</p>
      </div>
    </footer>


    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">
  </div>