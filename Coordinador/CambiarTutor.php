<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT A.nombreA, A.apellido_p, A.apellido_m, A.numero_control, G.nombre_grupo, C.siglas 
          FROM alumnos A 
            INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) 
              INNER JOIN carreras C ON(C.id_carreras = A.fk_carreras);";
$sql2 = "SELECT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas 
          FROM docentes D 
            INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras);";

$sql3= "SELECT AL.nombreA, AL.apellido_p AS 'ApellidoAl', AL.apellido_m AS 'ApellidoAl1',CA.siglas AS 'CarreraAlumno',
D.nombre_docente,D.apellido_p, D.apellido_m, C.siglas
   FROM asignar_tutor A 
     INNER JOIN docentes D ON D.id_docente = A.fk_docentes 
       INNER JOIN carreras C ON D.fk_carreras = C.id_carreras 
         INNER JOIN alumnos AL ON AL.id_alumnos = A.fk_alumno 
           INNER JOIN carreras CA ON AL.fk_carreras = CA.id_carreras ORDER BY D.nombre_docente;";

$sql4 = "SELECT D.id_docente, D.nombre_docente, D.apellido_p, D.apellido_m  
FROM docentes D INNER JOIN asignar_tutor AST ON (AST.fk_docentes = D.id_docente);";         

$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
$resultado3 = $conexion->query($sql3);
$resultado4 = $conexion->query($sql4);
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
    <link rel="stylesheet" href="../css/estiloC.css">
  </head>

<body>

<header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="GestionarAsignacion.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
 

  <main>

    <form action="cambiarT.php" method="POST" class="formulario"  style="margin-top:2%">  
        <h2 align="center">Cambiar tutor a un alumno</h2>
        <br>
        <div style="margin-left: 40%;">
        <h4>Alumno</h4>
        <?php
          include 'conexionC.php';
          $consulta = "SELECT A.nombreA, A.apellido_p, A.apellido_m FROM alumnos A LEFT JOIN asignar_tutor AST ON (AST.fk_alumno = A.id_alumnos) WHERE AST.fk_alumno IS NULL;";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select required name = 'alumno'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombreA']."'>";
              echo $columna['nombreA'] ," ", $columna['apellido_p']," ",$columna['apellido_m'];
              echo "</option>";      
          }
          echo "<select>";
          mysqli_close( $conexion );
          ?>

          <h4>Cambiar a:</h4>
          <?php
          include 'conexionC.php';
          $consulta = "SELECT DISTINCT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas FROM docentes D 
          INNER JOIN asignar_tutor ATR ON(D.id_docente = ATR.fk_docentes) 
          INNER JOIN carreras C ON (C.id_carreras = D.fk_carreras);";
          $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
          echo "<select  required name = 'docente'>";
          while ($columna = mysqli_fetch_array( $resultado ))
          {
              echo "<option value='". $columna['nombre_docente']."'>";
              echo $columna['nombre_docente']," ", $columna['apellido_p']," ",$columna['apellido_m'];
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
          <h1 align="center">Relacion de tutorados</h1>
          <table width="70%" border="2px" align="center">

          <tr align="center">
              <td>Nombre Alumno</td>
              <td>Carrera Alumno</td> 
              <td>Nombre Tutor</td>
              <td>Carrera Tutor</td>
          </tr>
          <?php 
              while($datos=$resultado3->fetch_array()){
              ?>
                  <tr align="center">
                      <td><?php echo $datos["nombreA"]," ",$datos["ApellidoAl"]," ", $datos["ApellidoAl1"]?></td>
                      <td><?php echo $datos["CarreraAlumno"]?></td>
                      <td><?php echo $datos["nombre_docente"]," ",$datos["apellido_p"]," ", $datos["apellido_m"]?></td>
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