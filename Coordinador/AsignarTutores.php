<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT A.nombreA, A.apellido_p, A.apellido_m, A.numero_control, G.nombre_grupo, C.siglas FROM alumnos A INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) INNER JOIN carreras C ON(C.id_carreras = A.fk_carreras);";
$sql2 = "SELECT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas FROM docentes D INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras);";
$sql3= "SELECT AL.nombreA,CA.siglas as 'CarreraAlumno',D.nombre_docente,C.siglas FROM asignar_tutor A INNER JOIN docentes D ON D.id_docente = A.fk_docentes INNER JOIN carreras C ON D.fk_carreras = C.id_carreras INNER JOIN alumnos AL ON AL.id_alumnos = A.fk_alumno INNER JOIN carreras CA ON AL.fk_carreras = CA.id_carreras";
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
$resultado3 = $conexion->query($sql3);
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
        <li class="nav-item"><a href="Solicitudes.php" class="nav-link">SOLICITUDES</a></li>
            <li class="nav-item"><a href="gestionarAlumnos.php" class="nav-link">GESTIONAR TUTORADOS</a></li>
            <li class="nav-item"><a href="AsignarTutores.php" class="nav-link">ASIGNAR TUTORES</a></li>
            <li class="nav-item"><a href="gestionarGruposCarreras.html" class="nav-link">GRUPOS/CARRERAS</a></li>
            <li class="nav-item"><a href="gestionarAsesorias.php" class="nav-link">GESTIONAR ASESORIAS</a></li>
            <li class="nav-item"><a href="GestionarReportes.php" class="nav-link">REPORTE TUTORES</a></li>
            <li class="nav-item"><a href="GestionarDatosC.html" class="nav-link">ACTUALIZAR DATOS DE USUARIO</a></li>
        
            
            <li class="nav-item"><a href="loginC.php" class="nav-link">CERRAR SESIÓN</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 

  <main>
    <h1 align="center">Relacion de tutorados</h1>
    <table width="70%" border="2px" align="center">

    <tr align="center">
        <td>Nombre_Alumno</td>
        <td>Carrera_Alumno</td> 
        <td>Nombre_Tutor</td>
        <td>Carrera_Tutor</td>
    </tr>
    <?php 
        while($datos=$resultado3->fetch_array()){
        ?>
            <tr align="center">
                <td><?php echo $datos["nombreA"]?></td>
                <td><?php echo $datos["CarreraAlumno"]?></td>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table> 
    <form action="asignarTutor.php" method="POST" class="formulario"  style="margin-top:2%">  
        <h2 align="center">Asignar tutor a un alumno</h2>
        <br>
        <div style="margin-left: 40%;">
        <h4>Docente</h4>
        <?php
          include 'conexionC.php';
          $consulta = "SELECT * FROM docentes";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select  required name = 'docente'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_docente']."'>";
              echo $columna['nombre_docente'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion ); 
          ?>
          <h4>Asignar a:</h4>
          <?php
          include 'conexionC.php';
          $consulta = "SELECT * FROM alumnos";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'alumno'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombreA']."'>";
              echo $columna['nombreA'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>
          </div>
        <div class = "rutas"style="margin-top:5%">
          <div class = "buton"><button type="submit"><a style="margin:20px">Asignar</a> </button></div>
        </div>
     
          </form>
             
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